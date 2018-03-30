<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
 	protected $fillable = ['name','alias','text'];
    //
    public function products() {
    	return $this->hasMany('App\Product');
    }
    public function sliders() {
    	return $this->hasMany('App\Slider');
    }
}
