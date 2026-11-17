<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProductController;
// 商品一覧表示
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品新規登録画面の表示
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// 商品登録処理の実行
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 商品詳細画面の表示
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

use App\Models\Company;

Route::get('/add-company', function () {
    $companies = ['サントリー', 'コカ・コーラ', 'キリン', 'アサヒ'];

    foreach ($companies as $name) {
        \App\Models\Company::firstOrCreate(['company_name' => $name]);
    }

    return 'メーカーをまとめて登録しました！';
});