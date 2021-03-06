<h3 class="page-header"><i class="fa fa-file-text-o"></i> Добавление слайда</h3>
<hr>

<div class="wrapper">

{!! Form::open(['url' => route('slidersAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group">
        {!! Form::label('type', 'Тип слайда:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::select('type', $types, null ,['class'=>'form-control', 'style'=>'width:7%'] ) !!}
            <small class="help-block">
            	1 - изображение слева, текст и кнопка справа<br />
				2 - изображение справа, текст и кнопка слева<br />
				3 - изображение на всю ширину монитора, текст и кнопка по центру
            </small>
        </div>
    </div>

	<div class="form-group">
		{!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"btn-info", 'data-iconName'=>'fa fa-image'  ,'data-placeholder'=>"Файла нет"] ) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('title','Заголовок:',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			{!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'Введите заголовок слайда']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
		<br />
		<small class="help-block">Небольшой рекламный текст (слоган, тезис, часть описания товара и т.п.)</small><br />
			{!! Form::textarea('text', old('text'), ['class' => 'form-control ckeditor','placeholder'=>'Рекламный текст']) !!}
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('btn','Надпись на кнопке:',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			{!! Form::text('btn',old('btn'),['class'=>'form-control','placeholder'=>'Введите текст']) !!}
			<small class="help-block">(До 100 символов).<br />
				Если оставить поле пустым, то кнопка отображаться на слайде не будет.
			</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
        {!! Form::label('page_id', 'Ссылка на категорию:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
			<select name="page_id" class="form-control" style="width: 30%;">
				<option value="" selected="">Выберите категорию</option>
				@foreach ($cats as $cat)
					<option value="{{$cat['id']}}">{{$cat['name']}}</option>
				@endforeach
			</select>
            <small class="help-block">
            	Какую категорию товара будет рекламировать слайд (т.е. куда перенаправить после нажатия на кнопку слайда). <br />
            	Если поле "Надпись на кнопке" пустое (т.е. кнопки не будет), то и это поле заполнять не нужно.
            </small>
        </div>
    </div>

	<div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

	{!! Form::close() !!}

</div>