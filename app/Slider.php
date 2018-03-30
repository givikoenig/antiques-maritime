<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
	protected $fillable = ['images', 'title' ,'text','btn','page_id','type'];

    public function page() {
    	return $this->belongsTo('App\Page');
    }
}
