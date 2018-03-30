<h3 class="page-header"><i class="fa fa-file-text-o"></i> Категории товаров</h3>
<hr>

<div class="text-center">
   <a class="btn btn-info" href="{{route('pagesAdd')}}" title="Add Page"><span class="fa fa-plus"></span> Добавить категорию</a>
</div>
<br />

@if($pages)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-flag-o"></i> Title</th>
                <th><i class="fa fa-stack-exchange"></i> Alias</th>
                <th><i class="fa fa-file-text-o"></i> Text</th>
                <th><i class="fa fa-calendar-o"></i> Date</th>
                <th colspan="2"><i class="fa fa-cogs"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $k=>$page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]), $page->name, ['alt'=>$page->name] ) !!}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td>{{ $page->created_at }}</td>
                <td>
                        <a class="btn btn-success" href="{{ route('pagesEdit', $page->id) }}"><i class="fa fa-edit" ></i></a>
                 </td>
                <td>
                    {!! Form::open(['url'=>route('pagesEdit',['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                    {{ method_field('delete') }}
                    {!! Form::button('<i class="fa fa-close"></i>', ['class'=>'btn btn-danger','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

    <br />
    <div class="text-center">
	   <a class="btn btn-info" href="{{route('pagesAdd')}}" title="Add Category"><span class="fa fa-plus"></span> Добавить категорию</a>
	</div>

<hr>
