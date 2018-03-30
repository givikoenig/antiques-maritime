 <header class="header header-dark"> 
  <div class="container">
    <div class="logo"><a href="{{ route('home') }}"><img src="{{  URL::asset('assets/images/logo-dark.png') }}" alt=""></a> 
      <!-- <h3>ANTIQUES-MARITIME.LOC</h3> -->
    </div>
  </div>
  @if (isset($menu))
  <div class="sticky">
    <div class="container">
      <nav class="webimenu"> 
        <div class="menu-toggle"> <i class="fa fa-bars"> </i> </div>
        <ul class="ownmenu">
          @foreach ($menu as $item)
          <li class="a-active"><a href="#{{ $item['alias']}}">{{ $item['title'] }}</a></li>
          @endforeach
          <li class="search-nav"><a href="#"><i class="fa fa-search"></i></a>
            <ul class="dropdown">
              <li class="row">
                <div class="col-sm-12 no-padding" >
                <form action="{{ route('searchres') }}" id="searchform" method="post">
                  <input  class="form-control" type="text" placeholder="Search Here" name="keyword" />
                  {!! csrf_field() !!}
                  <button type="submit" class="search"> <i class="fa fa-search"></i> </button>
                 </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  @endif
</header>

@if(session('status'))
<div class="alert alert-success">
  {{ session('status') }}
  <script>setTimeout(function(){location.href="/"} , 7000);</script>
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif