<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function poolOptions()
    {
        return $this->hasMany('App\Models\PoolOption');
    }

    public function poolOptionResults()
    {
        return $this->hasMany('App\Models\PoolOptionResult', 'pool_id');
    }


}
