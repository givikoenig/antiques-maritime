<h3 class="page-header"><i class="fa fa-file-text-o"></i>Редактировать категорию</h3>
<hr>

<div class="wrapper">

{!! Form::open(['url' => route('pagesEdit',array('page'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
             {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
                 </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}

    <div class="form-group">
             {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('alias', $data['alias'], ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-sm-8">
                        {!! Form::text('text', $data['text'], ['class' => 'form-control','placeholder'=>'Введите короткий текст (до 255 символов)']) !!}
                 </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-sm-offset-2 col-sm-8">
            {!! Form::button('Сохранить', ['class' => 'btn btn-info','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

</div>