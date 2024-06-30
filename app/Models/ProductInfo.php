<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $table = 'product_info';
    protected $fillable = ['product_id', 'username', 'password', 'status'];
    public $timestamps = false; // Disable timestamps


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
