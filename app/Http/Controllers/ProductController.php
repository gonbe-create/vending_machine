<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{
    public function index()
    {
         $products = Product::all();

         return view('products.index', compact('products'));
    }

    /**
     * 商品新規登録画面の表示
     * 
     * @return \Illuminate\View\View
     */
public function create()
{
   $companies = Company::all();

   return view('products.create', compact('companies'));
}
}
