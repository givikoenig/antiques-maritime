<h3 class="page-header"><i class="fa fa-file-text-o"></i> Добавление товара</h3>
<hr>

<div class="wrapper">

{!! Form::open(['url' => route('productsAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
	
	{{ Form::hidden('page_id', \Request::segment(4) ) }}

	<div class="form-group">
		{!! Form::label('visible','Показывать на сайте',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			{!! Form::checkbox('visible', 1, true); !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название товара']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('serial', 'Серийный №:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('serial', old('serial'), ['class' => 'form-control','placeholder'=>'Введите серийный №']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
			<small class="help-block">(Для отображения в соответствующей категории на главной странице)</small>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('descr', 'Описание:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('descr', old('descr'), ['class' => 'form-control ckeditor','placeholder'=>'Описание товара']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('techs', 'Технические характеристики:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::textarea('techs', old('techs'), ['class' => 'form-control ckeditor','placeholder'=>'Тех.характеристики товара']) !!}
			<small class="help-block">Например: <br /> 1. Accuracy of counting 1' <br />
											2. A mistake from a dead course and a bend of rulers 3'. <br />
											3. The dead corner of the right ruler doesn?t exceed 3'. <br />
											4. The error of a drum doesn't exceed 2'. </small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
            {!! Form::label('price','Цена [$]',['class'=>'col-xs-2 control-label']) !!}   
            <div class="col-sm-8">
                {!! Form::input('number','price',old('price'), ['step' => 'any', 'class' => 'form-control', 'style' => 'width:20%']) !!}
                <small class="help-block">Если цена договорная, то оставьте поле пустым</small>
            </div>
    </div>

    <div class="form-group">
		{!! Form::label('keywords', 'Ключевые слова:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('keywords', old('keywords'), ['class' => 'form-control','placeholder'=>'Введите keywords']) !!}
			<small class="help-block">Ключевые слова для поисковых систем (до 255 символов)</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('meta_desc', 'Meta-описание:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('meta_desc', old('meta_desc'), ['class' => 'form-control','placeholder'=>'Введите Meta-description']) !!}
			<small class="help-block">Краткое описание для продвижения в поисковых системах (до 255 символов)</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		<label for="galleryimg[]" class="col-sm-2 control-label">Галерея товара:<br /> <small>(до 10 изображений)</small> </label>
		<div class="col-sm-8" id="btnimg">
			<div><input class="btn btn-sm btn-info" type="file" data-bfi-disabled name="galleryimg[]" /></div>
			<small class="help-block">(Для детального отображения на странице конкретного товара )</small>
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

</div>