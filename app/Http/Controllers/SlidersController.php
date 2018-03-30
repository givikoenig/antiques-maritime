<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

class SlidersController extends Controller
{
    //
	public function execute() {

    if (view()->exists('admin.sliders')) {
	    	$sliders = Slider::all();

	    	$data = [
	    		'title' => 'Slides',
	    		'sliders' => $sliders
	    	];
	    	return view('admin.sliders',$data);
    	}
    	abort(404);

   	}
}
