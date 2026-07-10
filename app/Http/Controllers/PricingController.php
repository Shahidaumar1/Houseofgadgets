<?php

namespace App\Http\Controllers;

use App\Models\DeviceType;
use App\Models\Price;
use App\Models\Product;
use App\Models\RepairName;
use Illuminate\Http\Request;

class PricingController extends Controller
{


    public function index(Request $request)
    {
        $price = Price::all();
        $device_types = DeviceType::all();
        $products = RepairName::get();
        $data = RepairName::find($request->id);
        return view('frontend.pricing.pricing', compact('products', 'data', 'device_types', 'price'));
    }
    public function getphone(Request $request)
    {

        $data = Product::with('master', 'category')->where('id', $request->id)->first();
        return response()->json($data);
    }
}
