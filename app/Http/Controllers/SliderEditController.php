<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use Config;
use Validator;

use App\Slider;
use App\Page;

class SliderEditController extends Controller
{
    //
    public function execute(Slider $slider, Request $request) {

    	if ($request->isMethod('delete')) {

    		$slider->delete();

    		return redirect('admin')->with('status', 'Слайд уддален');

    	}

    	if ($request->isMethod('post')) {

    		$input = $request->except('_token');

    		$ext = 'jpg';
    		if($request->images) {
    			$ext = explode('.',$request->images->getClientOriginalName() )[1];
    		}

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    			'max' => 'Поле :attribute должно быть не более :max символов',
    		];

    		$validator = Validator::make($input,[
    				'type' => 'required',
                    'title' => 'max:255',
                    'btn' => 'max:100'
                ], $messages);

    		if ($validator->fails()) {
                return redirect()
                    ->route('sliderEdit',['slider'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.'.$ext;
                $img = Image::make($file);
                $img->fit(Config::get('settings.slide_image')[$input['type']]['width'],
                    Config::get('settings.slide_image')[$input['type']]['height'])->save(public_path().'/assets/images/slides/'.$imgname);
                $input['images'] = $imgname;
                }
            }

            $slider->fill($input);

            if ($slider->update()) {
                return redirect('admin')->with('status','Слайд обновлен');
            }
            unset($input);

    	}

    	$types = array( 1=>1, 2=>2, 3=>3 );

    	$pages = Page::with('sliders')->get();

    	$cats = array();
    	foreach ($pages as $page) {
    		$item = array('id'=>$page->id, 'name'=>$page->name);
    		array_push($cats, $item);
    	}

    	$old = $slider->toArray();

    	$data = [
            'title' => 'Редактирование слайда ',
            'data' => $old,
            'types'=> $types,
            'cats'=> $cats
        ];

    	if (view()->exists('admin.slider_edit')) {
            
            return view('admin.slider_edit',$data);
        }
        abort(404);

    }
}
