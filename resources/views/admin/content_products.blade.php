<h3 class="page-header"><i class="fa fa-file-text-o"></i> Товары</h3>

<div class="text-center">
{{ $pages->links() }}
</div>

<hr>

@if(isset($pages))

@foreach ($pages as $page)

<h4 class="page-header">{{ $page->name }}</h3>
<hr>

	<div class="text-center">
	   <a class="btn btn-info" href="{{route('productsAdd',$page->id)}}" title="Add Product"><span class="fa fa-plus"></span> Добавить товар категории {{ $page->name }}</a>
	</div>
	<br />

	@if($page->products)

		<table class="table table-hover table-striped">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th><i class="fa fa-flag-o"></i> Name</th>
	                <th>Serial</th>
	                <th><i class="fa fa-eye"></i> Visible</th>
	                <th><i class="fa fa-usd"></i> Price</th>
	                <th><i class="fa fa-file-text-o"></i> Description</th>
	                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
	                <th><i class="fa fa-calendar-o"></i> Date</th>
	                <th colspan="2"><i class="fa fa-cogs"></i> Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach($page->products as $k=>$product)
	            <tr>
	                <td>{{ $product->id }}</td>
	                <td>{!! Html::link(route('productEdit',['product'=>$product->id]), $product->name, ['alt'=>$product->name] ) !!}</td>
	                <td>{{ $product->serial }}</td>
	                <td>{!! $product->visible ? '<i class="fa fa-check"></i>' : '' !!}</td>
	                <td>{{ $product->price }}</td>
	                <td>{!! str_limit($product->descr, 60) !!}</td>
	                <td>
	                	<img src="{{ asset('assets')}}/images/products/{{ json_decode($product->images, true)['min'] }}" alt="" width="55">
	                </td>
	                <td>{{ $product->created_at }}</td>
	                <td>
	                        <a class="btn btn-success" href="{{ route('productEdit', $product->id) }}"><i class="fa fa-edit" ></i></a>
	                 </td>
	                <td>
	                    {!! Form::open(['url'=>route('productEdit',['product'=>$product->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
	                    {!! Form::hidden('id', $product->id ) !!}
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
	   <a class="btn btn-info" href="{{route('productsAdd',$page->id)}}" title="Add Product"><span class="fa fa-plus"></span> Добавить товар категории {{ $page->name }}</a>
	</div>

<hr>

<div class="text-center">
{{ $pages->links() }}
</div>


@endforeach

@endif