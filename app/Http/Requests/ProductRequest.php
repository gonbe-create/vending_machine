<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'product_name' => 'required',
            'company_id'   => 'required',
            'price'        => 'required|integer',
            'stock'        => 'required|integer',
            'comment'      => 'nullable',
            'img_path'     => 'nullable|image',
        ];
    }
    public function attributes()
    {
        return [
            'product_name' => '商品名',
            'company_id'   => 'メーカー名',
            'price'        => '価格',
            'stock'        => '在庫数',
            'comment'      => 'コメント',
            'img_path'     => '商品画像',
        ];
    }
}
