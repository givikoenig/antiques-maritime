<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use Validator;

class PagesEditController extends Controller
{
    //
    public function execute(Page $page, Request $request) {

    	if ($request->isMethod('delete')) {
            
            $page->products()->delete();
            $page->delete();

            return redirect('admin')->with('status','Категория удалена');
        }

    	if ($request->isMethod('post')) {

    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    			'max' => 'Поле :attribute должно быть не более :max символов',
    			'unique' => 'Такой псевдоним категории уже присутствует'
    		];

    		$validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
                    'text' => 'required|max:255'
                ],$messages);

    		if ($validator->fails()) {
                return redirect()
                    ->route('pagesEdit',['page'=>$input['id']])
                    ->withErrors($validator);
            }

            $page->fill($input);

            if ($page->update()) {
                return redirect('admin')->with('status','Категория обновлена');
            }

    	}

    	$old = $page->toArray();

    	$data = [
            'title' => 'Редактирование категории ',
            'data' => $old,
        ];

    	if (view()->exists('admin.pages_edit')) {
            
            return view('admin.pages_edit',$data);
        }
        abort(404);

    }
}
