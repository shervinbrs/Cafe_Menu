<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/bootstrap.css">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/style.css">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/swiper-bundle.min.css">
    <script src="{{URL::asset('/js')}}/jquery.min.js"></script>
    <title>{{$setting['cafeName'][0]['value']}}</title>
</head>
<body>
    <div class="container-fluid text-center position-fixed menu-navigator">
        <div class="row">
            <div class="col-md-12 mt-4 mb-3" id="navbar">
                <h1 class="h5">{{$setting['cafeName'][0]['value']}}</h1>
            </div>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($menus as $item)
                <div class="swiper-slide text-center" menu="{{$item['id']}}">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                            <img src="/storage/{{$item['icon']}}" alt="" class="mb-2" height=64px width=64px>
                            <h6 class="card-title">{{$item['name']}}</h6>
                        </div>
                    </div>
                  </div>
                  @endforeach
              {{-- end --}}
            </div>
          </div>
    </div>
    <div class="container-fluid text-right text-light menu-content">
        <div class="container">
        <div class="row py-4">
            @foreach($categories as $item)
            <div class="col-md-12 text-center mb-3 menu-name" id="{{$item['menu_id']}}">
                <div class="line"></div>
                <h4>{{$item['name']}}</h4>
                <div class="line"></div>
            </div>
            @foreach($items as $selecteditem)
            @if($selecteditem['category_id'] == $item['id'])
            <div class="col-md-6 mb-2">
                <div class="card border-dark bg-dark menu-item">
                    <div class="card-body">
                        <img src="/storage/{{$selecteditem['img']}}" alt="" class="ml-2" width=128px height=128px>
                        <div class="ml-3" style="display: inline-block; position: absolute;height: 80%;">
                            <h6>{{$selecteditem['name']}}</h6>
                            <h6 class="text-justify" style="font-size:13px;line-height: 1.2rem;">{{$selecteditem['desc']}}</h6>
                            <div class="price" style="position:absolute; bottom:0;font-size:15px">
                                {{number_format(preg_replace('/0{1,3}$/', '', $selecteditem['price'],3),0,'.','.')}}
                                <small>هــــزار<small>تـــومان</small></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
        </div>
    </div>
    <script src="{{URL::asset('/js')}}/swiper-bundle.min.js"></script>
    <script>
        var navbar = 250;
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 2,
          spaceBetween: 30,
          centeredSlides: true,
          slideToClickedSlide : true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints:{
              430:{
                  slidesPerView: 3
              },
              800:{
                slidesPerView: 5,
              }
          }
        });

        swiper.on('slideChange', function (e) {
            $('html, body').animate({
            scrollTop: $('#'+$(e.slides[e.snapIndex]).attr('Menu')).offset().top-250
            }, 500);
            
        });
        // header scroll
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
          if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.cssText = 'height:30px;margin-bottom:1rem !important;margin-top:1.5 !important';
          } else {
            document.getElementById("navbar").style.cssText = 'height:0;margin-bottom:0 !important;margin-top:10px !important';
          }
          prevScrollpos = currentScrollPos;
        }
      </script>
</body>
</html>