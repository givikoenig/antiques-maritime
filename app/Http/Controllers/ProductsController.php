<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Page;

class ProductsController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.products')) {
	    	$pages = Page::with('products')->paginate(1);

	    	// dd($pages);
	    	$data = [
	    		'title' => 'Products',
	    		'pages' => $pages
	    	];
	    	return view('admin.products',$data);
    	}
    	abort(404);

    }
}
