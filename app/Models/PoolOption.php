<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolOption extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function poolOptionResults()
    {
        return $this->hasMany('App\Models\PoolOptionResult');
    }

}
