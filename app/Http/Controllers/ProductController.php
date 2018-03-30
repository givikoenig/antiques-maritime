<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelCaptcha\Facades\Captcha;

use Mail;

use App\Product;

class ProductController extends Controller
{
    //
    public function execute($id, Request $request) {

    	if($request->isMethod('post')) {

    		$this->validate($request,[
                        
                        'email' => 'required|email',
                        'message' => 'required',
                        'captcha' => 'required|bone_captcha'
                        ]);

    		$data = $request->all();

            $result = Mail::send('site.email',['data'=>$data], function($message) use ($data) {

                $mail_admin = 'support@antiques-maritime.loc';

                $message->from($data['email']);
                $message->to($mail_admin,'Mr.Admin')->subject('Sent via site antiques-maritime.loc');

            });

            if ($result) {
                return redirect()->route('home')->with('status','Message sent');
            }


    	}

    	if (!$id) {
    		abort(404);
    	}

    	if (view()->exists('site.product')) {

    		$product = Product::where('id', $id)->first();
            
            if($product) {
    		  $category_id = $product->page->id;
            
        		$related = Product::where('page_id', $category_id)->get();
        		$slides = explode('|', $product->img_slide);

        		$data = [

        			'title' => $product->name,
        			'product' => $product,
        			'related' => $related,
        			'slides' => $slides,
        			'captcha' => Captcha::html()

        		];

        		return view('site.product', $data);
            } else {
                abort(404);
            }
    	} else {
    		abort(404);
    	}

    }
}
