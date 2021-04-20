<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolOptionResult extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function PoolOption()
    {
        return $this->belongsTo('App\Models\PoolOption');
    }
    
}
