<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProducts extends Model
{
    use HasFactory;

    protected $table = 'type_products';

    protected $fillable = [
        'name',
        'active',
    ];
}
