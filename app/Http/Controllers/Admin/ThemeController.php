// app/Http/Controllers/Admin/ThemeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ThemeController extends Controller
{
    public function apply(Request $request)
    {
        try {
            $data = $request->validate([
                'name'      => 'required|string|max:120',
                'tags'      => 'nullable|string',
                'colors'    => 'required|array|min:3|max:10',
                'colors.*'  => ['regex:/^#?([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/'],
            ]);

            // normalize to #RRGGBB
            $data['colors'] = array_map(function ($c) {
                $c = strtoupper(ltrim($c, '#'));
                if (strlen($c) === 3) {
                    $c = "{$c[0]}{$c[0]}{$c[1]}{$c[1]}{$c[2]}{$c[2]}";
                }
                return "#{$c}";
            }, $data['colors']);

            $settings = SiteSetting::getSiteSettings(); // creates row if missing
            $settings->update(['active_theme' => $data]);

            return response()->json(['ok' => true]);
        } catch (Throwable $e) {
            Log::error('Theme apply failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // front-end ko readable error bhej do
            return response()->json([
                'error' => 'Server error',
                'hint'  => $e->getMessage(),
            ], 500);
        }
    }
}
