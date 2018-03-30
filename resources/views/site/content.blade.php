<section class="home-slider">
  <div class="tp-banner-container">
    <div class="tp-banner">
      @if (isset($sliders))
      <ul>
        @foreach ($sliders as $slider)
        @if ($slider->type == 1)
        <li data-transition="fade" data-slotamount="7"> <img src="{{ asset('assets') }}/images/slides/slide-17.jpg" data-bgposition="center top" alt="" />
          <div class="tp-caption sfr tp-resizeme" 
          data-x="left" 
          data-y="300"
          data-speed="700" 
          data-start="1000" 
          data-easing="easeOutBack"
          data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
          data-splitin="none" 
          data-splitout="none" 
          data-elementdelay="0.1" 
          data-endelementdelay="0.1" 
          data-endspeed="300" 
          data-captionhidden="on"><img src="{{ asset('assets') }}/images/slides/{{ $slider->images }}"  alt="" > </div>
          @elseif  ($slider->type == 2)
          <li data-transition="fade" data-slotamount="7"> <img src="{{  URL::asset('assets/images/slides/slide-18.jpg') }}" data-bgposition="center top" alt="" />
            <div class="tp-caption sfr tp-resizeme" 
            data-x="right" 
            data-y="top"
            data-speed="700" 
            data-start="1000" 
            data-easing="easeOutBack"
            data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
            data-splitin="none" 
            data-splitout="none" 
            data-elementdelay="0.1" 
            data-endelementdelay="0.1" 
            data-endspeed="300" 
            data-captionhidden="on"><img src="{{ asset('assets') }}/images/slides/{{ $slider->images }}"  alt="" > </div> 
            @elseif  ($slider->type == 3)
            <li data-transition="fade" data-slotamount="7"> <img src="{{  URL::asset('assets') }}/images/slides/{{ $slider->images }}" data-bgposition="center top" alt=""/>
              @endif
              <div class="tp-caption sfb  font-montserrat text-center tp-resizeme" 
              <?php if($slider->type == 1): ?>
                data-x="right" 
              <?php elseif($slider->type == 2): ?>
                data-x="left"
              <?php elseif($slider->type == 3): ?>
                data-x="center"
              <?php endif; ?>
              data-y="center" 
              data-speed="700" 
              data-start="1200" 
              data-easing="easeOutBack"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              data-captionhidden="on" 
              style="color: #272727; font-size: 30px; text-transform: uppercase;">{{ $slider->title }}</div>
              <div class="tp-caption sfb  font-montserrat no-space text-left tp-resizeme" 
              <?php if($slider->type == 1): ?>
                data-x="right" 
              <?php elseif($slider->type == 2): ?>
                data-x="left"
              <?php elseif($slider->type == 3): ?>
                data-x="center"
              <?php endif; ?> 
              data-y="center" data-voffset="80" 
              data-speed="700" 
              data-start="1600" 
              data-easing="easeOutBack"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              data-captionhidden="on" 
              style="color: #959595; font-size: 12px; line-height:24px;">
              @foreach(array_chunk(explode(" ", $slider->text),12) as $str)
              <br />
              @foreach($str as $k => $word)
              {!! $word !!} 
              @endforeach
              @endforeach
            </div>
            <div class="tp-caption sfb tp-resizeme" 
            <?php if($slider->type == 1): ?>
              data-x="right" 
            <?php elseif($slider->type == 2): ?>
              data-x="left"
            <?php elseif($slider->type == 3): ?>
              data-x="center"
            <?php endif; ?> 
            data-y="500" 
            data-speed="700" 
            data-start="2000" 
            data-easing="easeOutBack"
            data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
            data-splitin="none" 
            data-splitout="none" 
            data-elementdelay="0.1" 
            data-endelementdelay="0.1" 
            data-endspeed="300" 
            data-captionhidden="on">
            @if (!is_null($slider->btn))
            <a href="#{{$slider->page->alias}}" class="btn btn-small btn-dark">{{ $slider->btn }}</a> 
            @endif
          </div>
        </li>
        @endforeach
      </ul>
      @endif
    </div>
  </div>
</section>

<!-- CONTENT START -->
<div class="content">
  <section class="section-p-60px services welcome no-padding-b">
    <div class="container"> 
      <!--  Tittle -->
      <div class="tittle  animate fadeInUp" data-wow-delay="0.4s">
        <h5>WELCOME TO antiques-maritime STORE</h5>
        <hr>
        <p>“What comes first, the compass or the clock? Before one can truly manage time, it is important to know where you are going, what your priorities and goals are, in which direction you are headed. Where you are headed is more important than how fast you are going. Rather than always focusing on what's urgent, learn to focus on what is really important.” </p>
        <i style="color: #bbb;"> Napoleon Bonaparte</i>
      </div>
    </div>
  </section>
  <section class="subcribe animate fadeInUp" data-wow-delay="0.4s" data-stellar-background-ratio="0.8">
    <div class="overlay">
      <div class="container">
        <h1>&nbsp;</h1>
      </div>
    </div>
  </section>

  @if (isset($pages))
  @foreach($pages as $key => $block)
  <section class="section-p-30px new-arrival new-arri-w-slide">
    <div class="container"> 
      <div id="{{$block->alias}}" class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
        <h5>{{$block->name}}</h5>
        <hr>
        <p>{{$block->text}}</p>
      </div>
      <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s"> 
        @foreach($block->products as $product)
          @if($product->visible == 1)
          <div class="items-in"> 
            <img src="{{ asset('assets')}}/images/products/{{ json_decode($product->images,true)['min'] }}" alt=""> 
            <div class="over-item">
              <ul class="animated fadeIn">
                <li> <a href="{{ asset('assets')}}/images/products/{{ json_decode($product->images,true)['min'] }}" data-lighter><i class="ion-search"></i></a></li>
                <li class="full-w"> <a href="{{ route('product',$product->id) }}" class="btn">details</a></li>
              </ul>
            </div>
            <div class="details-sec"> <a href="{{ route('product',$product->id) }}" style="height: 70px; overflow: hidden;">{{$product->name}}</a> <span class="font-montserrat">{{
              $product->price ? '$ '.$product->price : ''}}</span> </div>
            </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>
    @if( ($key + 1)%2 == 0 )
    <section class="subcribe animate fadeInUp" data-wow-delay="0.4s" data-stellar-background-ratio="0.8">
      <div class="overlay">
        <div class="container">
          <h1>&nbsp;</h1>
        </div>
      </div>
    </section>
    @endif
    @endforeach
    @endif

    @if (isset($prods))
    <section class="section-p-30px in-the-look no-padding-b"> 
      <div class="tittle animate fadeInUp" data-wow-delay="0.4s">
        <h5>IN THIS LOOK</h5>
        <p>Recent Products</p>
      </div>
      <ul>
        @foreach ($prods as $l => $prod)
        <li class="animate fadeInLeft" data-wow-delay="0.4s"> <img src="{{ asset('assets') }}/images/products/{{ json_decode($prod->images,true)['med'] }}" alt="" >
          <div class="inn-look">
            <div style="height: 80px; overflow: hidden;">
             <a href="{{ route('product',$prod->id) }}">{{$prod->name}}</a>
           </div>
           <hr>   
           <span>{{ $prod->price ? '$ '.$prod->price : '' }}</span> <a href="{{ route('product',$prod->id) }}" class="btn">read more</a> </div>
         </li>
         @endforeach
       </ul>
     </section>
     @endif

     <section class="section-p-30px conact-us no-padding-b animate fadeInUp" data-wow-delay="0.4s"> 
      <div class="container"> 
        <div class="tittle">
          <h5>CONTACT US</h5>
          <p>Please don’t hesitate to contact me if you have any questions, comments or messages. <br>
            I’ll try to respond to everything!</p>
          </div>
          <div class="contact section-p-30px no-padding-b">
            <div class="contact-form"> 
              <form  action="{{ route('home') }}" role="form" id="contact_form" class="contact-form" method="post">
                <div class="row">
                  <div class="col-md-6">
                  <input type="hidden" name="prodid" value="">
                  <input type="hidden" name="prodname" value="">
                  <input type="hidden" name="prodserial" value="">
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
                          <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND MESSAGE</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>

      </div>

      <footer>
        <div class="container-fluid">

          <div class="text-center"> <a href="#."><img src="{{ asset('assets')}}/images/logo.png" alt=""></a><br>
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