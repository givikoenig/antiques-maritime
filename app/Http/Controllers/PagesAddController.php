<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Page;


class PagesAddController extends Controller
{
    //
	public function execute(Request $request) {

	if ($request->isMethod('post')) {

    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    			'max' => 'Поле :attribute должно быть не более :max символов',
    			'uniques' => 'Такой псевдоним категории ( :unique ) уже присутствует'
    		];

    		$validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:255|unique:pages',
                    'text' => 'required|max:255'
                ], $messages);

    		if ($validator->fails()) {
    			return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
    		}

    		$page = new Page;

            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status','Категория добавлена');
            }

    	}

    if (view()->exists('admin.pages_add')) {
            
            $data = [
                'title' => 'New Category'
            ];
            return view('admin.pages_add',$data);
        }
        abort(404);
    
    }

}
