<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelCaptcha\Facades\Captcha;

use Illuminate\Support\Facades\Input;

use App\Page;
use App\Product;
use App\Slider;

use Mail;

class IndexController extends Controller
{
    //
    public function execute(Request $request) {
// 
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
                $message->to($mail_admin,'Mr.Administrator')->subject('Отправлено через сайт antiques-maritime.loc');

            });
                return redirect()->route('home')->with('status','Message was sent. You will soon receive our reply.');

        }

    	$pages = Page::with('products')->get();
    	$products = Product::where('visible', '1')->take(5)->orderBy('created_at','desc')->get();
        $sliders = Slider::all(); 

    	$menu = array();
    	foreach ($pages as $page) {
    		$item = array('title'=>$page->name, 'alias'=>$page->alias);
    		array_push($menu,$item);
    	}

    	return view('site.index',[
    			'menu' => $menu,
    			'pages' => $pages,
                'prods' => $products,
    			'sliders' => $sliders,
                'captcha' => Captcha::html()
                
    	]);
    }

    public function searchProduct()  {

        $keyword = Input::get('keyword');
        $srchs = Product::SearchByKeyword($keyword)->get();

        $searches = array();
        foreach ($srchs as $srch) {
            $tmp = array( 'id'=>$srch->id ,'serial'=>$srch->serial, 'name'=>$srch->name, 'price'=>$srch->price, 'descr'=>$srch->descr, 'techs'=>$srch->techs, 'images'=>$srch->images );
            array_push($searches,$tmp);
        }

        if (!is_null($keyword)) {
            return view('site.search', [
                'searches' => $searches,
                'keyword' => $keyword
                ]);
        } else {
            return back();
        }
        abort(404);

    }



}
