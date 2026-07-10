<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    // ═══════════════════════════════════════════════════════════
    //  REPAIR FLOW
    // ═══════════════════════════════════════════════════════════

    /** GET /chatbot/brands?category_id=4 */
    public function brands(Request $request)
    {
        $catId = (int) $request->category_id;

        $brands = DB::table('device_types')
            ->where('category_id', $catId)
            ->where('status', 'Publish')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'slug')
            ->orderBy('name')   // ✅ FIX: sort_order column nahi hai, orderBy name use karo
            ->get()
            ->map(function ($b) {
                $b->icon = $this->brandIcon($b->name);
                return $b;
            });

        return response()->json($brands->values());
    }

    /** GET /chatbot/models?brand_id=4 */
    public function models(Request $request)
    {
        $brandId = (int) $request->brand_id;

        $models = DB::table('modals')
            ->whereExists(function ($q) {
                $q->select(DB::raw(1))
                  ->from('prices')
                  ->whereColumn('prices.modal_id', 'modals.id')
                  ->where('prices.price', '>', 0);
            })
            ->where('device_type_id', $brandId)
            ->where('status', 'Publish')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'slug')
            ->orderBy('name')   // ✅ FIX: safe column
            ->get()
            ->map(function ($m) {
                $m->slug = $this->cleanSlug($m->slug, $m->name);
                return $m;
            });

        return response()->json($models->values());
    }

    /** GET /chatbot/repairs?model_id=123 */
    public function repairs(Request $request)
    {
        $modelId = (int) $request->model_id;

        $modal     = DB::table('modals')->where('id', $modelId)->first();
        $modalSlug = $modal ? $this->cleanSlug($modal->slug, $modal->name) : '';

        $brandSlug = $categorySlug = '';
        if ($modal) {
            $brand = DB::table('device_types')->where('id', $modal->device_type_id)->first();
            if ($brand) {
                $brandSlug = $this->cleanSlug($brand->slug, $brand->name);
                $category  = DB::table('categories')->where('id', $brand->category_id)->first();
                if ($category) {
                    $categorySlug = $this->cleanSlug($category->slug, $category->name);
                }
            }
        }

        $repairs = DB::table('prices')
            ->join('repair_types', 'repair_types.id', '=', 'prices.repair_type_id')
            ->where('prices.modal_id', $modelId)
            ->where('prices.price', '>', 0)
            ->whereNotNull('prices.price')
            ->select(
                'repair_types.id as repair_type_id',
                'repair_types.name as repair_name',
                'repair_types.slug as repair_slug',
                'prices.price'
            )
            ->orderBy('repair_types.id')
            ->get()
            ->map(function ($r) use ($categorySlug, $brandSlug, $modalSlug) {

                $price = (float) $r->price;
                $rSlug = $this->cleanSlug($r->repair_slug, $r->repair_name);

                if ($price <= 0.015) {
                    $priceType    = 'quotation';
                    $displayPrice = null;
                    try {
                        $url = route('quotation.livewire', ['device' => $brandSlug, 'modal' => $modalSlug, 'repair' => $rSlug]);
                    } catch (\Exception $e) {
                        $url = url("quotation/{$brandSlug}/{$modalSlug}/{$rSlug}");
                    }
                } elseif ($price <= 0.025) {
                    $priceType    = 'free_booking';
                    $displayPrice = null;
                    try {
                        $url = route('free-repair-booking', [
                            'category_slug' => $categorySlug,
                            'device_slug'   => $brandSlug,
                            'model_slug'    => $modalSlug,
                            'repair_slug'   => $rSlug,
                        ]);
                    } catch (\Exception $e) {
                        $url = url("repair/{$categorySlug}/{$brandSlug}/{$modalSlug}/{$rSlug}/free-repair-booking");
                    }
                } else {
                    $priceType    = 'instant';
                    $displayPrice = $price;
                    try {
                        $url = route('repair-detail', [
                            'category_slug' => $categorySlug,
                            'device_slug'   => $brandSlug,
                            'modal_slug'    => $modalSlug,
                            'repair_slug'   => $rSlug,
                        ]);
                    } catch (\Exception $e) {
                        $url = url("repair/{$categorySlug}/{$brandSlug}/{$modalSlug}/{$rSlug}");
                    }
                }

                return [
                    'repair_name' => $r->repair_name,
                    'repair_slug' => $rSlug,
                    'price'       => $displayPrice,
                    'price_type'  => $priceType,
                    'url'         => $url,
                ];
            });

        return response()->json($repairs->values());
    }

    // ═══════════════════════════════════════════════════════════
    //  BUY FLOW
    // ═══════════════════════════════════════════════════════════

    /** GET /chatbot/buy-categories */
    public function buyCategories(Request $request)
    {
        $cats = DB::table('categories')
            ->whereExists(function ($q) {
                $q->select(DB::raw(1))
                  ->from('device_types')
                  ->join('modals', 'modals.device_type_id', '=', 'device_types.id')
                  ->join('product_specs', 'product_specs.model_id', '=', 'modals.id')
                  ->whereColumn('device_types.category_id', 'categories.id')
                  ->where('product_specs.quantity', '>', 0)
                  ->whereNull('device_types.deleted_at')
                  ->whereNull('modals.deleted_at');
            })
            ->where('status', 'Publish')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'slug')
            ->orderBy('id')   // ✅ FIX: sort_order nahi — id use karo
            ->get()
            ->map(function ($c) {
                $c->icon = $this->categoryIcon($c->name);
                return $c;
            });

        // Fallback: agar empty ho to sari published categories do
        if ($cats->isEmpty()) {
            $cats = DB::table('categories')
                ->where('status', 'Publish')
                ->whereNull('deleted_at')
                ->select('id', 'name', 'slug')
                ->orderBy('id')
                ->get()
                ->map(function ($c) {
                    $c->icon = $this->categoryIcon($c->name);
                    return $c;
                });
        }

        return response()->json($cats->values());
    }

    /** GET /chatbot/buy-brands?category_id=4 */
    public function buyBrands(Request $request)
    {
        $catId = (int) $request->category_id;

        $brands = DB::table('device_types')
            ->where('category_id', $catId)
            ->where('status', 'Publish')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'slug')
            ->orderBy('name')   // ✅ FIX: sort_order nahi
            ->get()
            ->map(function ($b) {
                $b->icon = $this->brandIcon($b->name);
                return $b;
            });

        return response()->json($brands->values());
    }

    /** GET /chatbot/buy-models?brand_id=4 */
    public function buyModels(Request $request)
    {
        $brandId = (int) $request->brand_id;

        $models = DB::table('modals')
            ->whereExists(function ($q) {
                $q->select(DB::raw(1))
                  ->from('product_specs')
                  ->whereColumn('product_specs.model_id', 'modals.id')
                  ->where('product_specs.quantity', '>', 0);
            })
            ->where('device_type_id', $brandId)
            ->where('status', 'Publish')
            ->whereNull('deleted_at')
            ->select('id', 'name', 'slug')
            ->orderBy('name')   // ✅ FIX: sort_order nahi
            ->get()
            ->map(function ($m) {
                $m->slug = $this->cleanSlug($m->slug, $m->name);
                return $m;
            });

        return response()->json($models->values());
    }

    /** GET /chatbot/buy-specs?model_id=97 */
    public function buySpecs(Request $request)
    {
        $modelId = (int) $request->model_id;

        $modal     = DB::table('modals')->where('id', $modelId)->first();
        $modalSlug = $modal ? $this->cleanSlug($modal->slug, $modal->name) : '';

        $brandSlug = '';
        if ($modal) {
            $brand = DB::table('device_types')->where('id', $modal->device_type_id)->first();
            if ($brand) {
                $brandSlug = $this->cleanSlug($brand->slug, $brand->name);
            }
        }

        $specs = DB::table('product_specs')
            ->where('model_id', $modelId)
            ->where('quantity', '>', 0)
            ->whereNotNull('price')
            ->where('price', '>', 0)
            ->select(
                'id', 'memory_size', 'condition', 'color', 'grade',
                'price', 'network_unlocked', 'account_cleared', 'warranty',
                'image', 'ram', 'generation', 'scree_size', 'quantity'
            )
            ->orderBy('price', 'asc')
            ->get()
            ->map(function ($s) use ($modal, $modalSlug, $brandSlug) {
                $url = url("guest-buy-product/specs/{$modalSlug}");
                return [
                    'id'               => $s->id,
                    'memory_size'      => $s->memory_size      ?? 'N/A',
                    'condition'        => $s->condition        ?? 'Good',
                    'color'            => $s->color            ?? '',
                    'grade'            => $s->grade            ?? '',
                    'price'            => (float) $s->price,
                    'network_unlocked' => $s->network_unlocked ? 'Yes' : 'No',
                    'account_cleared'  => $s->account_cleared  ? 'Yes' : 'No',
                    'warranty'         => $s->warranty         ?? '',
                    'image'            => $s->image            ?? '',
                    'ram'              => $s->ram              ?? '',
                    'generation'       => $s->generation       ?? '',
                    'screen_size'      => $s->scree_size       ?? '',
                    'quantity'         => $s->quantity,
                    'url'              => $url,
                    'model_name'       => $modal->name         ?? '',
                    'model_slug'       => $modalSlug,
                    'brand_slug'       => $brandSlug,
                ];
            });

        return response()->json($specs->values());
    }

    /** GET /chatbot/debug — sab kuch check karo, baad mein hata dena */
    public function debug(Request $request)
    {
        // Columns check karo — sort_order hai ya nahi
        $dtColumns = DB::select("SHOW COLUMNS FROM device_types");
        $catColumns = DB::select("SHOW COLUMNS FROM categories");
        $modalColumns = DB::select("SHOW COLUMNS FROM modals");

        return response()->json([
            'categories_publish'    => DB::table('categories')->where('status','Publish')->whereNull('deleted_at')->count(),
            'device_types_publish'  => DB::table('device_types')->where('status','Publish')->whereNull('deleted_at')->count(),
            'modals_publish'        => DB::table('modals')->where('status','Publish')->whereNull('deleted_at')->count(),
            'product_specs_instock' => DB::table('product_specs')->where('quantity','>',0)->count(),
            'prices_count'          => DB::table('prices')->where('price','>',0)->count(),
            'sample_categories'     => DB::table('categories')->whereNull('deleted_at')->select('id','name','status')->limit(5)->get(),
            'sample_device_types'   => DB::table('device_types')->whereNull('deleted_at')->select('id','name','category_id','service','status')->limit(5)->get(),
            'device_types_columns'  => array_column($dtColumns, 'Field'),
            'categories_columns'    => array_column($catColumns, 'Field'),
            'modals_columns'        => array_column($modalColumns, 'Field'),
        ]);
    }

    // ═══════════════════════════════════════════════════════════
    //  HELPERS
    // ═══════════════════════════════════════════════════════════

    private function cleanSlug($slug, $fallbackName = '')
    {
        $s = rtrim(trim($slug ?? ''), '-');
        if (empty($s) && !empty($fallbackName)) {
            $s = Str::slug($fallbackName);
        }
        return $s;
    }

    private function brandIcon($name)
    {
        $map = [
            'apple'=>'🍎','samsung'=>'📱','google'=>'🔍','huawei'=>'📱',
            'oneplus'=>'🔴','motorola'=>'📱','dell'=>'💻','hp'=>'💻',
            'lenovo'=>'💻','asus'=>'💻','sony'=>'🎮','playstation'=>'🎮',
            'microsoft'=>'🎮','nintendo'=>'🎮','xbox'=>'🎮','amazon'=>'🔥',
            'oppo'=>'📱','xiaomi'=>'📱','honor'=>'📱','toshiba'=>'💻',
            'acer'=>'💻','razer'=>'💻','msi'=>'💻',
        ];
        $key = strtolower(explode(' ', trim($name))[0]);
        return $map[$key] ?? '📱';
    }

    private function categoryIcon($name)
    {
        $n = strtolower($name);
        if (str_contains($n,'phone')   || str_contains($n,'mobile'))   return '📱';
        if (str_contains($n,'laptop')  || str_contains($n,'computer')) return '💻';
        if (str_contains($n,'tablet')  || str_contains($n,'ipad'))     return '📲';
        if (str_contains($n,'console') || str_contains($n,'gaming'))   return '🎮';
        if (str_contains($n,'watch'))                                   return '⌚';
        return '📦';
    }
}