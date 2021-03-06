<h3 class="page-header"><i class="fa fa-file-text-o"></i> Слайды</h3>

<hr>

<div class="text-center">
   <a class="btn btn-info" href="{{route('slidersAdd')}}" title="Add Slide"><span class="fa fa-plus"></span> Добавить слайд</a>
</div>
<br />

@if(isset($sliders))

<table class="table table-hover table-striped">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>Type</th>
	                <th><i class="fa fa-flag-o"></i> Title</th>
	                <th class="text-center"><i class="fa fa-image"></i> Picture</th>
	                 <th><i class="fa fa-file-text-o"></i> Text</th>
	                <th><i class="fa fa-toggle-on"></i> Button</th>
	                <th><i class="fa fa-link"></i> Link to Category</th>
	                <th><i class="fa fa-calendar-o"></i> Date</th>
	                <th colspan="2"><i class="fa fa-cogs"></i> Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach ($sliders as $slider)
					<tr>
	                <td>{{ $slider->id }}</td>
	                <td>{{ $slider->type }}</td>
	                @if ($slider->title)
	                	<td>{!! Html::link(route('sliderEdit',['slider'=>$slider->id]), $slider->title, ['alt'=>$slider->title] ) !!}</td>
	                @else
	                	<td>{!! Html::link(route('sliderEdit',['slider'=>$slider->id]), 'Нет' ) !!}</td>
	                @endif	
	                <td>
	                	<img src="{{ asset('assets')}}/images/slides/{{ $slider->images }}" alt="" width="75">
	                </td>
	                <td>{{ $slider->text }}</td>
	                @if ($slider->btn)
	                	<td>{{ $slider->btn }}</td>
	                @else
						<td>Нет</td>
					@endif
	                @if ($slider->page)
	                	<td>{{$slider->page->name}}</td>
	                @else
						<td>Нет</td>
					@endif
	                <td>{{ $slider->created_at }}</td>
	                <td>
	                        <a class="btn btn-success" href="{{ route('sliderEdit', $slider->id) }}"><i class="fa fa-edit" ></i></a>
	                 </td>
	                <td>
	                    {!! Form::open(['url'=>route('sliderEdit',['slider'=>$slider->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
	                    {!! Form::hidden('id', $slider->id ) !!}
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
   <a class="btn btn-info" href="{{route('slidersAdd')}}" title="Add Slide"><span class="fa fa-plus"></span> Добавить слайд</a>
</div>
