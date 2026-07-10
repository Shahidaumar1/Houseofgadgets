<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RepairTypeController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/create-category',[CategoryController::class,'createCategory']);
Route::post('/create-company',[CompanyController::class,'create']);
Route::post('/create-modal',[ModalController::class,'create']);
Route::post('/create-repair_type',[RepairTypeController::class,'create']);
Route::post('/create-price',[PriceController::class,'create']);



Route::get('test',function(){
    $category = Category::where('id',1)->first();
    return $category->companies[0]->modals[0]->repair_types[1]->price;
    $categories = Category::with('companies','modals','repair_types','price')->get();
    // $category = $categories[0]
    return $categories;
});
