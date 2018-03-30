<h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактирование товара</h3>
<hr>

<div class="wrapper">

{!! Form::open(['url' => route('productEdit',array('product'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data', 'id'=>'prodform' ]) !!}
	{!! Form::hidden('id', $data['id'], array('id' => 'goods_id') ) !!}

    <input type="hidden" name="id" value="{{ $data['id']}}">

	<div class="form-group">
		{!! Form::label('visible','Показывать на сайте',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			<input name="visible" type="checkbox" value="1" {{$data['visible'] ? 'checked' : ''}}>
		</div>
		<br /><br />
	</div>

    <div class="form-group">
        {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введите название товара']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('serial', 'Серийный №:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('serial', $data['serial'], ['class' => 'form-control','placeholder'=>'Введите серийный №']) !!}
                 </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-sm-offset-2 col-sm-10">
            {!! Html::image('assets/images/products/'.json_decode($data['images'],true )['min'],'',['class'=>'img-responsive','width'=>'80px']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
        </div>
    </div>

    <div class="form-group">
		{!! Form::label('images', 'Изменить изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
			<small class="help-block">(Для отображения в соответствующей категории на главной странице)</small>
		</div>
	</div>

    <div class="form-group">
             {!! Form::label('descr', 'Описание:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::textarea('descr', $data['descr'], ['class' => 'form-control ckeditor','placeholder'=>'Описание товара']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('techs', 'Технические характеристики:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::textarea('techs', $data['techs'], ['class' => 'form-control ckeditor','placeholder'=>'Тех.характеристики товара']) !!}
                 </div>
    </div>

    <div class="form-group">
            {!! Form::label('price','Цена [$]',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-sm-8">
                {!! Form::input('number','price', $data['price'], ['step' => 'any', 'class' => 'form-control', 'style' => 'width:20%']) !!}
                <small class="help-block">Если цена договорная, то оставьте поле пустым</small>
            </div>
    </div>

    <div class="form-group">
		{!! Form::label('keywords', 'Ключевые слова:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('keywords', $data['keywords'], ['class' => 'form-control','placeholder'=>'Введите keywords']) !!}
			<small class="help-block">Ключевые слова для поисковых систем (до 255 символов)</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('meta_desc', 'Meta-описание:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('meta_desc', $data['meta_desc'], ['class' => 'form-control','placeholder'=>'Введите Meta-description']) !!}
			<small class="help-block">Краткое описание для продвижения в поисковых системах (до 255 символов)</small>
		</div>
		<br /><br />
	</div>
    

    <div class="form-group">
        <label for="img_slide[]" class="col-sm-2 control-label">Текущие изображения:<br />
            <small>(кликните по картинке для удаления)</small>
         </label>
        <div class="col-sm-offset-2 col-sm-10">
             @if (isset($img_slides))
             <table>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                @foreach($img_slides as $l => $imgslide)
                    <td style="padding-left: 10px;"  class="delimg" >
                        <img src="{{ asset('assets') }}/images/products/slides/{{ $imgslide }}" alt='{{ $imgslide }}' attr-loop="{{ $l }}"  attr-id="{{ $data['id'] }}" attr-route="{{route('delProdSlide',$data['id'])}}" width="50" type="button" style="cursor: pointer;"  class="slideimg slide_{{$l}}">
                    </td>
                @endforeach
                </tr>
             </table>
             <meta name="csrf-token" content="{{csrf_token()}}">
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="galleryimg[]" class="col-sm-2 control-label">Добавить изображение:<br /> </label>
        <div class="col-sm-8" id="btnimg">
            <div><input class="btn btn-sm btn-info" type="file" data-bfi-disabled name="galleryimg[]" /></div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Добавить поле', ['id'=>'add' , 'class' => 'btn btn-sm btn-default']) !!}
            {!! Form::button('Удалить поле', ['id'=>'del' , 'class' => 'btn btn-sm btn-default']) !!}
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

<div class="col-sm-8 results" style="background: #fff; color: red; position: fixed; bottom: 200px; left: 40%; border: 1px solid #333; border-radius: 5px; height: 150px; width: 300px; display: none; text-align: center;"></div>

</div>