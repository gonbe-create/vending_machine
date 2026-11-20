<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function registProduct($data, $imgPath = null)
    {
        $product = new self();
        $product->company_id   = $data->company_id;
        $product->product_name = $data->product_name;
        $product->price        = $data->price;
        $product->stock        = $data->stock;
        $product->comment      = $data->comment;
        $product->img_path     = $imgPath;
        $product->save();
    }

    public function updateProduct($data, $id, $imgPath = null)
    {
        $product = self::findOrFail($id);
        $product->company_id   = $data->company_id;
        $product->product_name = $data->product_name;
        $product->price        = $data->price;
        $product->stock        = $data->stock;
        $product->comment      = $data->comment;
        if ($imgPath !== null) {
            $product->img_path = $imgPath;
        }
        $product->save();
    }

    public function getList($keyword =null, $companyId = null)
    {
        $query = self::with('company');

        if (!empty($keyword)) {
            $query->where('product_name', 'like', '%' . $keyword . '%');
        }
        if (!empty($companyId)) {
            $query->where('company_id', $companyId);
        }

        return $query->get();
    }

    public function deleteProduct($id)
    {
        $product = self::findOrFail($id);
        $product->delete();
    }
}
