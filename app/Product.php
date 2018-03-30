<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
	use Searchable;

	public $asYouType = true;
    
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

	protected $fillable = ['name','serial', 'page_id' ,'price','descr','techs','images','img_slide','visible','hits','new','keywords','meta_desc'];
    //
    public function page() {
    	return $this->belongsTo('App\Page');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("serial", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    
}
