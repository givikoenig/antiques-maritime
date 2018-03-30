<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Image;
use Config;

use App\Slider;
use App\Page;

class SlidersAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {

    		$input = $request->except('_token');

    		$ext = 'jpg';
            if($request->images) {
                $ext = explode('.',$request->images->getClientOriginalName() )[1];
            }

            // dd($input['type']);
            $messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    			'max' => 'Поле :attribute должно быть не более :max символов',
    		];

    		$validator = Validator::make($input,[
    				'type' => 'required',
                    'images' => 'required',
                    'title' => 'max:255',
                    'btn' => 'max:100'
                ], $messages);

    		if ($validator->fails()) {
    			return redirect()->route('slidersAdd')->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.'.$ext;
                $img = Image::make($file);
                $img->fit(Config::get('settings.slide_image')[$input['type']]['width'],
                    Config::get('settings.slide_image')[$input['type']]['height'])->save(public_path().'/assets/images/slides/'.$imgname);
                // $img->crop(400,600,100,0)->save(public_path().'/assets/images/slides/'.$imgname);
                $input['images'] = $imgname;
                }
            }
            
            $slider = new Slider;

            $slider->fill($input);

            if ($slider->save()) {
                return redirect('admin')->with('status','Слайд добавлен');
            }

    	}

    	$types = array( 1=>1, 2=>2, 3=>3 );

    	$pages = Page::with('sliders')->get();

    	$cats = array();
    	foreach ($pages as $page) {
    		$item = array('id'=>$page->id, 'name'=>$page->name);
    		array_push($cats, $item);
    	}

    	if (view()->exists('admin.sliders_add')) {
            
            $data = [
                'title' => 'New Slide',
                'types' => $types,
                'cats' => $cats
            ];
            return view('admin.sliders_add',$data);
        }
        abort(404);

    }
}
