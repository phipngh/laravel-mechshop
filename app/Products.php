<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];

    public function catelogies(){
        return $this->belongsTo('App\Catelogies');
    }

    public function brands(){
        return $this->belongsTo('App\Brands');
    }

    public function products(){
        return $this->hasOne('App\Stocks');
    }
}
