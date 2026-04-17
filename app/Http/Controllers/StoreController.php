<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function product_insert_form(){
        return view('product.insert-form');
    }

    Route::get('/product/insert-form', [StoreController::class, 'product_insert_form'])->name('product_insert_form')

    public function show(){

    
    return view('store',[
        // 'product_categories' => ProductCategory::all()
        'products' => Product::where('stock','>',0)->with(['product_category'])->get()
    ]);
    }
    
}
