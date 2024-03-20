<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBoxType extends Model
{
    use HasFactory;

    protected $table = 'product_box_type';

    protected $fillable = [
        'products_id',
        'box_type_id',
        'active',
    ];

    public function product_b()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }

    public function box_type_b()
    {
        return $this->belongsTo(BoxType::class, 'box_type_id');
    }
}
