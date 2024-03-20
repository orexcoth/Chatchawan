<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boxs extends Model
{
    use HasFactory;

    protected $table = 'boxs';

    protected $fillable = [
        'name',
        'box_type_id',
        'width',
        'lengt',
        'high',
        'dimension',
        'weight',
        'active',
    ];

    public function box_type()
    {
        return $this->belongsTo(BoxType::class, 'box_type_id');
    }


}
