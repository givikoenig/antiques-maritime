  <br /><br /><br /><br /><br /><br />

  <!-- CONTENT START -->
  <div class="content"> 

  @if (isset($searches))
    <!--======= SUB BANNER =========-->
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="{{route('home')}}">HOME</a></li>
          <li class="active">{!! $keyword ? 'SEARCH RESULT BY KEY <span style="color: #af5875;"> "'. $keyword . '"</span> :' : ''  !!}</li>
        </ol>
      </div>
    </section>

    <div class="row">
			<div class="col-sm-8 col-sm-offset-2 prod-data">
				<table class="table table-hover table-striped">
			        <thead>
			            <tr>
			                
			                <th><i class="fa fa-flag-o"></i> Name</th>
			                <th> Serial #</th>
			                <th><i class="fa fa-usd"></i> Price</th>
			                <th><i class="fa fa-file-text-o"></i> Description</th>
                      <th class="text-center"><i class="fa fa-image"></i> Picture</th>
			            </tr>
			        </thead>
			        <tbody>
						@foreach ($searches as $link)
             <tr>
              <td class="a-active search-td">{!! Html::link( route('product',$link['id']), $link['name'], ['alt'=>$link['name'] ] ) !!}</td>
						 	<td>{{ $link['serial'] }}</td>
						 	<td>{{ $link['price'] }}</td>
						 	<td class="search-td">{!! $link['descr'] !!}</td>
              <td>
                <a href="{{ route('product',$link['id']) }}"><img src="{{ asset('assets')}}/images/products/{{ json_decode($link['images'], true)['min'] }}" alt="" width="55"></a>
              </td>
						 </tr>
						@endforeach
			        </tbody>
	        	</table>
			</div>
		</div>
	
	@endif

  </div>


    <!--======= Footer =========-->
  <footer>
        <div class="container-fluid">

          <div class="text-center"> <a href="{{ route('home') }}"><img src="{{ asset('assets')}}/images/logo.png" alt=""></a><br>
            <img class="margin-t-40" src="{{ asset('assets')}}/images/hammer.png" alt="">
          </div>

          <div class="row">
           <div class="col-md-4 rights">
            <p>© 2017 ANTIQUES-MARITIME. All Rights Reserved.</p>
          </div>
          <div class="col-md-4 rights">
            <p style="text-transform: none;"><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;support@antiques-maritime.loc</p>
          </div>
          <div class="col-md-4 rights">
            <p  style="font-size: 10px;">Powered by: <a href="#">GiViK</a> </p>
          </div>
        </div>

      </div>
  </footer> 

  <!-- GO TO TOP --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 