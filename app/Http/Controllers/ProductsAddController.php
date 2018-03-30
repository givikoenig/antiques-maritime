<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Image;
use Config;

use App\Product;
use App\Page;

class ProductsAddController extends Controller
{
    //
	public function execute(Request $request) {

		if ($request->isMethod('post')) {

			$input = $request->except('_token');

			$pageid = $input['page_id'];
            
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
    			return redirect()->route('productsAdd', $pageid)->withErrors($validator)->withInput();
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

                        if( !isset($galleryfiles) ){
                            $galleryfiles = $imgname;
                        }else{
                            $galleryfiles .= "|{$imgname}";
                        }

                    }

                }

                $input['img_slide']  = $galleryfiles;
            }
    		
    		$product = new Product();
    		$product->fill($input);

    		if ($product->save()) {
    			return redirect('admin')->with('status','Товар добавлен');
    		}
    		unset($input);

		}

		if (view()->exists('admin.products_add')) {
            $data = [
                'title' => 'New Product',
            ];
            return view('admin.products_add',$data);
        }
        abort(404);
    
    }


}
