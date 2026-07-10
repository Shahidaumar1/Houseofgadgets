<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function create(Request $request)
    {
         $data = $request->validate([
             'price' => 'required',
             'repair_type_id' => 'required',

         ]);
         $price = new Price();
         $price->price = $request->price;
         $price->repair_type_id = $request->repair_type_id;
         $price->save();

    }
}
