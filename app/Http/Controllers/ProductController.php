<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
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

/**
* 商品新規登録処理
*/
public function store(ProductRequest $request)
{
     $imgPath = null;
     if ($request->hasFile('img_path')) {
          $imgPath = $request->file('img_path')->store('images', 'public');
     }
     
     DB::beginTransaction();
     try {
          $model = new Product();
          $model->registProduct($request, $imgPath);
          DB::commit();
     } catch (\Exception $e) {
          DB::rollback();
          returnback();
     }

     return redirect()->route('products.index');
}
/**
 * 商品詳細画面の表示
 */
public function show($id)
{
     $product = Product::findOrFail($id);

     return view('products.show', compact('product'));
}

/**
 * 商品編集画面の表示
 */
public function edit($id)
{
     $product = Product::findOrFail($id);
     $companies = Company::all();

     return view('products.edit', compact('product', 'companies'));
}
/**
 * 商品更新処理
 */
public function update(ProductRequest $request, $id)
{
     $imgPath = null;
     if ($request->hasFile('img_path')) {
          $imgPath = $request->file('img_path')->store('images', 'public');
     }

     DB::beginTransaction();
     try {
          $model = new Product();
          $model->updateProduct($request, $id, $imgPath);
          DB::commit();
     } catch (\Exception $e) {
          DB::rollback();
          return back();
     }

     return redirect()->route('products.show', $id);
}

public function index(Request $request)
     {
          $keyword = $request->input('keyword');
          $companyId = $request->input('company_id');

          $model = new Product();
          $products = $model->getList($keyword, $companyId);
          $companies = Company::all();

          return view('products.index', compact('products', 'companies'));
     }

     public function destroy($id)
     {
          DB::beginTransaction();
          try {
               $model = new Product();
               $model->deleteProduct($id);
               DB::commit();
          } catch (\Exception $e) {
               DB::rollback();
               return back();
          }
          return redirect()->route('products.index');
     }
}
