<h3 class="page-header"><i class="fa fa-file-text-o"></i> Добавление категории товара</h3>
<hr>

<div class="wrapper">

	{!! Form::open(['url' => route('pagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}  
		<div class="col-sm-8">
			{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя категории']) !!}
			<small class="help-block">Как оно будет выглядеть в меню, напр. Clocks или  Chronometers</small>
		</div>
		<br /><br />
	</div>


	<div class="form-group">
		{!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним категории']) !!}
			<small class="help-block">Латиница без пробелов, напр. clocks или  chronometers</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group">
		{!! Form::label('text', 'Краткое описание:',['class'=>'col-xs-2 control-label']) !!}
		<div class="col-sm-8">
			{!! Form::text('text', old('text'), ['class' => 'form-control','placeholder'=>'Краткое описание категории']) !!}
			<small class="help-block">(до 255 символов ). Как оно будет выглядеть в разделе сайта, напр.  для раздела "Navigation" - "Protactors, Anemometers, Marine star globes etc…"</small>
		</div>
		<br /><br />
	</div>

	<div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

	{!! Form::close() !!}

    </div>