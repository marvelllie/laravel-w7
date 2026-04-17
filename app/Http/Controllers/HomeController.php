<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function show(){
        return view('home', [
            'product_category' => ProductCategory::with(['products'])->get()
        ]);

    }
}