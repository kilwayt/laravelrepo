<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'image_url',
        'stock_count',
    ];
    public function productInfo()
    {
        return $this->hasOne(ProductInfo::class);
    }
}
