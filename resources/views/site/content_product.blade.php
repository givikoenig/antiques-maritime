  <br /><br /><br /><br /><br /><br />

  <!-- CONTENT START -->
  <div class="content"> 
    @if (isset($product))
    <!--======= SUB BANNER =========-->
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="{{route('home')}}">HOME</a></li>
          <li><a href="{{ route('home') }}#{{$product->page->alias}}">{{ $product->page->name }}</a></li>
          <li class="active">{{ $product->name }} {{$product->serial ? ' / #'.$product->serial : '' }} </li>
        </ol>
      </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="section-p-30px pages-in item-detail-page">
      <div class="container">
        <div class="row"> 
          
          <!--======= IMAGES SLIDER =========-->
          @if (isset($slides))
          <div class="col-sm-6 large-detail animate fadeInLeft" data-wow-delay="0.4s">
            <div class="images-slider">
              <ul class="slides">
                @foreach ($slides as $slide)
                <li data-thumb="{{ asset('assets') }}/images/products/slides/{{ !empty($slide) ? $slide : 'noGoods.png' }}"> <img class="img-responsive" src="{{ asset('assets') }}/images/products/slides/{{ !empty($slide) ? $slide : 'noGoods.png' }}"  alt="{{ !empty($slide) ? $slide : 'noGoods.png' }}"> </li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          
          <!--======= ITEM DETAILS =========-->
          <div class="col-sm-6 animate fadeInRight" data-wow-delay="0.4s">

            <div class="row">

              <div class="col-sm-12 prod-data">
                <h5>{{ $product->name }} {{$product->serial ? ' / #'.$product->serial : '' }}</h5>
                <span class="price">{!! $product->price ? 'Price: $ '.$product->price : '<a href="#send-order" class="price">Ask Price</a>' !!}</span>
              </div>
              
              <div class="item-decribe animate fadeInUp" data-wow-delay="0.4s" style="padding-left: 20px;">
                @if ($product->descr)
                  <h6>DESCRIPITION:</h6>
                  <p>{!! $product->descr !!}</p>
                @endif
                @if ($product->techs)  
                  <h6>TECHNICAL FEATURES:</h6>
                  <p>{!! $product->techs !!}</p>
                @endif  
              </div>

            </div>
           
            <hr>
            
            <div class="row"> 
              <!-- QUIENTY -->
              <div class="col-sm-12">
                <div class="fun-share">
                  <a href="#send-order" class="btn btn-small btn-dark">ORDER NOW</a>
                </div>
              </div>
            </div>

          </div>

        </div>
        
          <section class="section-p-30px conact-us no-padding-b animate fadeInUp" data-wow-delay="0.4s">

            <div class="container"> 
              <div class="tittle"  id="send-order">
                <h5>FILL THE FORM</h5>
                </div>
                <div class="contact section-p-30px no-padding-b" style="width: 95%;">
                  <div class="contact-form"> 
                    <form  action="{{ route('home') }}" role="form" id="contact_form" class="contact-form" method="post">
                      <div class="row">
                        <div class="col-md-6">
                        <input type="hidden" name="prodid" value="{{$product->id}}">
                        <input type="hidden" name="prodname" value="{{$product->name}}">
                        <input type="hidden" name="prodserial" value="{{$product->serial}}">
                          <ul class="row">
                            <li class="col-sm-12">
                              <label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="* YOUR EMAIL">
                              </label>
                            </li>
                            <li class="col-sm-12">
                              <label>
                                <input type="text" class="form-control" name="place" id="company" placeholder="COUNTRY/CITY">
                              </label>
                            </li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="row">
                            <li class="col-sm-12">
                              <label>
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder="*MESSAGE"></textarea>
                              </label>
                            </li>
                          </ul>
                        </div>
                        <div class="row">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                            <ul class="row">
                              <li class="col-sm-12 msgcaptcha">
                                {!! $captcha !!}
                                <input type="text" id="captcha" name="captcha">
                              </li>
                            </ul>
                          </div>
                        </div>
                        {!! csrf_field() !!}
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="row">
                              <li class="col-sm-12">
                                <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND ORDER</button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

          </section>
      
      <!--======= RELATED PRODUCTS =========-->
      <section class="section-p-60px new-arrival new-arri-w-slide">
        <div class="container"> 
          <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
            <h5>RELATED PRODUCTS</h5>
            <p class="font-playfair">Most haver in {{$product->page->name}} category </p>
          </div>
          <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s"> 
            @foreach ($related as $item)
            <div class="items-in">
              <img src="{{ asset('assets') }}/images/products/{{ json_decode($item->images,true)['min'] }}" alt="{{ $item->name }}">
              <!-- Hover Details -->
              <div class="over-item">
                <ul class="animated fadeIn">
                  <li> <a href="{{ asset('assets') }}/images/products/{{ json_decode($item->images,true)['min'] }}" data-lighter><i class="ion-search"></i></a></li>
                  <li class="full-w"> <a href="{{ route('product',$item->id) }}" class="btn">ORDER NOW</a></li>
                  <!-- Rating Stars -->
                  <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                </ul>
              </div>
              <!-- Item Name -->
              <div class="details-sec"> <a href="#."   style="height: 70px; overflow: hidden;">{{$item->name}}</a> <span class="font-montserrat">{{$item->price ?  '$ '.$item->price : '' }}</span> </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>

    </section>

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

