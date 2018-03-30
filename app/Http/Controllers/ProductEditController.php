<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use Config;
use Validator;

use Illuminate\Support\Facades\Input;

use App\Product;


class ProductEditController extends Controller
{
    //

    public function execute(Product $product, Request $request) {

    	if ($request->isMethod('delete')) {

    		$input = $request->except('_token');
            $product->delete();

            return redirect('admin')->with('status','Товар удален');
        }

    	if ($request->isMethod('post')) {

    		$input = $request->except('_token');

			if (!isset($input['visible'])) {
				$input['visible'] = '0';
			} 

    		$ext = 'jpg';
    		if($request->images) {
    			$ext = explode('.',$request->images->getClientOriginalName() )[1];
    		}

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    			'max' => 'Поле :attribute должно быть не более :max символов',
    		];

    		$validator = Validator::make($input,[
                    'name' => 'required|max:255',
                    'descr' => 'required'
                ], $messages);

    		if ($validator->fails()) {
                return redirect()
                    ->route('productEdit',['product'=>$input['id']])
                    ->withErrors($validator);
            }

            if ($request->hasFile('images')) {

    			$image = $request->file('images');

    			if ($image->isValid()) {

    				$str = str_random(8);
					$obj = new \stdClass;

					$obj->min = $str.'_min.'.$ext;
					$obj->med = $str.'_med.'.$ext;

					$img = Image::make($image);

					$img->fit(Config::get('settings.product_img')['min']['width'],
						Config::get('settings.product_img')['min']['height'])->save(public_path().'/assets/images/products/'.$obj->min);
					$img->fit(Config::get('settings.product_img')['med']['width'],
						Config::get('settings.product_img')['med']['height'])->save(public_path().'/assets/images/products/'.$obj->med);

					$input['images'] = json_encode($obj);

    			}
    		}

            if ($request->hasFile('galleryimg')) {

                $files = $request->file('galleryimg');
                $slcount = count(explode('|',$product->img_slide));
                
                foreach ($files as $k => $file) {
                    $slext = 'jpg';
                    if($request->galleryimg[$k]) {
                        $slext = explode('.',$request->galleryimg[$k]->getClientOriginalName() )[1];
                    }

                    if ($file->isValid()) {
                        $str = str_random(8);
                        $imgname = $str.'_'.$k.'.'.$slext;
                        $img = Image::make($file);
                        $img->fit(Config::get('settings.product_slide_image')['width'],
                    Config::get('settings.product_slide_image')['height'])->save(public_path().'/assets/images/products/slides/'.$imgname);

                        $input['img_slide'] = $imgname;

                       if($slcount == 0)  {
                            if(!isset($galleryfiles)){
                                $galleryfiles = $imgname;
                            }else{
                                $galleryfiles .= "|{$imgname}";
                            }
                        } else {
                            if(!isset($galleryfiles)){
                                $galleryfiles = "{$product->img_slide}|{$imgname}";
                            }else{
                                $galleryfiles .= "|{$imgname}";
                            }

                        }

                    }

                }

                $input['img_slide']  = $galleryfiles;
            }

    		$product->fill($input);

            if ($product->update()) {
                return back()->with('status','Товар обновлен');
            }
            unset($input);

    	}

    	$old = $product->toArray();

        $img_slides = explode('|' ,$product['img_slide']);

    	$data = [
            'title' => 'Редактирование товара ',
            'data' => $old,
            'img_slides' => $img_slides,
        ];

    	if (view()->exists('admin.product_edit')) {
            
            return view('admin.product_edit',$data);
        }
        abort(404);

    }

    public function delProdSlide(Product $product, Request $request) {

        $img_to_del = Input::get('img');

        if ($img_to_del) {
            if (preg_match("/|/", $product->img_slide)) {
                    $imgs = explode('|', $product->img_slide);
                } else {
                    $imgs = $product->img_slide;
                }

                foreach ($imgs as $item) {
                    if ($item == $img_to_del) {
                         continue;
                    }

                    if(!isset($gallerydel)){
                       $gallerydel = $item;
                    } else {
                       $gallerydel .= "|{$item}";
                    }
                                    
                }
                if(!isset($gallerydel)) {
                    $gallerydel = '';
                }

                $inp = $request->except('_token');

                $inp['img_slide']  = $gallerydel;

                $product->fill($inp);

                if ($product->update()) {
                    $resp = '<div class="success"><h4 style="padding-top: 50px;">Изображение удалено</h4></div>';
                     return \Response::json($resp);
                } 
                unset($inp);
                
            }

        }


}
