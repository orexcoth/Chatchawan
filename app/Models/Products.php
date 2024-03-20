<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'name_th',
        'name_en',
        'detail',
        'width',
        'lengt',
        'high',
        'dimension',
        'weight',
        'unit_id',
        'type_id',
        'active',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }


    public function TypeProducts()
    {
        return $this->belongsTo(TypeProducts::class, 'type_id');
    }
}
