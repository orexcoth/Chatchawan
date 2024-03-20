<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $table = 'product_group';

    protected $fillable = [
        'products_id',
        'regions_id',
        'group_name',
    ];

    public function product_g()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }

    public function regions_g()
    {
        return $this->belongsTo(Regions::class, 'regions_id');
    }
}
