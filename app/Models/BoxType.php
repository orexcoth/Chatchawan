<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxType extends Model
{
    use HasFactory;

    protected $table = 'box_type';

    protected $fillable = [
        'name',
        'active',
    ];
}
