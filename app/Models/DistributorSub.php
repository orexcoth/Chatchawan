<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorSub extends Model
{
    use HasFactory;

    protected $table = 'distributor_sub';

    protected $fillable = [
        'name',
        'users_id',
        'active',
    ];

    public function users()
    {
        return $this->belongsTo(usersModel::class, 'users_id');
    }
}
