<?php

namespace App\Models;

class ProductSkuAttribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
