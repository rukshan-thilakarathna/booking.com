@extends('web.Blocks.layout')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{asset('web/assets/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/slider/slider.css?fd')}}" type="text/css">

   
    <link rel="stylesheet" href="{{asset('web/css/dates.css?fd')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/slide2.css?fd')}}" type="text/css">
    
@endsection

@section('style')
    <style>
        #zse1 {background: url("{{asset('web/img/section-image/Find-Your-Ideal-Stay-in-Paradise.jpg')}}");height: 60vh;background-size: cover;position: relative;}
        .zd1 {position: absolute;width: 50%;display: flex;flex-direction: column;text-align: center;margin: auto;top: 25%;right: 0;left: 0;}
        .zh1 {color: white;font-size: 60px;font-weight:bold;font-family: "Cormorant Garamond", serif !important;}
        #zse1::before {content: "";display: block;width: 100%;height: 100%;background: #00000073;}
        .zd2 {padding: 3px 15px;background: white;border-radius: 72px;display: flex;justify-content: space-between;align-items: center;margin-top: 25px;}
        .zd3 {background: white;border-radius: 37px;display: flex;width: 85%;}
        .zin1 {color: #767676;border: none;outline: none;border-right: 1px solid #D3D3D3;text-align: center;font-size: 16px;padding: 0 10px;width:35%; }
        .zin1:last-child {border-right: none!important;}
        #z2se2 {    padding: 50px 0 15px;text-align: center;}
        .z2d1 {display: flex;justify-content: space-between;margin: 26px 0;}
        .z2d2 {background: red;height: 300px;border-radius: 10px;position: relative;}
        .z2d1-1 {width: 25%;}
        .z2d1-2 {width: 30%;}
        .z2d1-3 {width: 40%;}
        .z2h1 {font-size: 35px;font-weight: 400;}
        #z2d3 {flex-direction: row-reverse;}
        .z2d4 {text-align: left;padding: 20px;position: absolute;bottom: 0;left: 0;}
        .z2h2 {color: white;}
        .z2s1 {color: white;font-weight: 500;}
        .z2d2::before {content: "";display: block;width: 100%;height: 100%;background:url("{{asset('web/img/effect/top-destination-effect.png')}}");border-radius: 10px;background-size: cover;background-position-y: 300px;}
        #z3se1 {text-align: center;margin-bottom: 50px;}
        .z3h1 {font-size: 35px;font-weight: 400;}
        .z3d1 {width: 30%;    margin-bottom: 25px;}
        .z3i1 {width: 100%;border-radius: 10px;height: 245px;}
        .z3h2 {font-size: 20px;font-weight: 400;margin: 6px 0;}
        #z4se1 {padding: 21px 0;background: #011c46;}
        .z4d1 {display: flex;justify-content: space-around;align-items: center;}
        #z4p1 {padding: 15px 0 4px;font-size: 16px;}
        #z4h1 {color: white;font-size: 35px;letter-spacing: 1px;margin: 0;}
        .z4a1 {text-decoration: navajowhite;border: 2px solid white;padding: 10px 32px;background: #ffffff;color: #0e0d0d;border-radius: 35px;width: 251px;font-weight: 500;}
        #z5se1 {text-align: center;padding: 75px 0;background: #F6F6F6;}
        .z5d1 {display: flex;justify-content: space-between;}
        .zd5d2 {width: 32%;}
        .z5h1{font-size: 35px;font-weight: 400;}
        .z5i1 {width: 80px;}
        .z5h2 {font-size: 25px;}
        .z5p1 {color: #2f2f2f;font-family: "Cormorant Garamond", serif;font-size: 21px;}
        #z6se1 {text-align: center;padding:  50px 0;}
        .z6d1 {display: flex;justify-content: space-between;}
        .x1d1 {width: 32%;}
        .x1d2{position: relative;padding: 15px;height: 175px;display: flex;flex-direction: column;justify-content: space-between;border-radius: 10px;}
        .x1d3 {display: flex;justify-content: space-between;position: relative;z-index: 10;}
        .x1s1 {background: #ACD24B;padding: 4px 15px;border-radius: 20px;color: white;}
        .x1i1 {width: 25px;}
        .x1d4 {display: flex;justify-content: space-between;position: relative;z-index: 10;}
        .xis2 {color: white;text-align: left;font-weight: 400;}
        .x1i2 {width: 90px;height: 23px;margin-top: 20px;}
        .x1d2::before {content: "";background: url("{{assert('web/img/effect/top-destination-effect.png')}}");position: absolute;left: 0;width: 100%;height: 100%;bottom: 0;z-index: 0;}
        .x1s4 {color: #7b7b7b;margin-left: 20px;position: relative;}
        .x1h2 {font-size: 20px !important; margin: 0 5px !important;font-weight: normal !important;color: #000000 !important;}
        .xid5 {background: #ffffff70;padding: 15px;text-align: left;position: absolute;top: 0;width: 100%;}
        #z7se1 {height: 300px;display: flex;justify-content: center;}
        #z7se1::before {content: "";background: #00000061;height: 300px;background-size: cover;position: absolute;width: 100%;left: 0;z-index: 0;}
        .z7d1 {width: 50%;height: 100%;display: flex;align-items: center;justify-content: center;}
        #z7d2{background: url("{{asset('web/img/Cheers.png')}}");background-size: cover;}
        #z7d3{background: url("{{asset('web/img/Honeymoon.png')}}");background-size: cover;}
        .z7h1 {color: white;font-size: 45px;}
        .z7p1 {padding: 0 0;font-size: 16px;}
        .z7d4 {position: relative;z-index: 3;}
        .z7a1 {text-decoration: none;color: white;margin-top: 32px;display: block;border: 4px solid white;width: max-content;padding: 10px 20px;border-radius: 42px;font-size: 16px;}
        #z8se1 {text-align: center;padding:  50px 0;}
        .z8d1 {display: flex;justify-content: space-between;}
        p{color: white}
        #_1:before{content: '';position: absolute;width: 120%;bottom: 0;height: 4px;left: 0;background: var(--cyan);z-index: 1;margin-left: -4px;}



        @media screen and (max-width:1570px) {#zfm1 {flex-direction: column;}.zd3 {flex-wrap: wrap;width: 90%;margin-bottom: 16px;}.zin1 {width: 50%;padding: 10px;border: none;margin: 8px 0;border-bottom: 1px solid;}.zd2 {border-radius: 25px;}#sbt{width: 100%;}section#z7se1 {flex-direction: column;height: 877px;}#z7se1::before {height: 100% !important;}div.z7d1 {width: 100%;}}
        @media screen and (max-width:720px) {.zin1 {width: 100%;}.zd1 {top: 23%;}.z3d1 {width: 48%;}.z4d1 {width: 100%;}}
        @media screen and (max-width:590px) {section#zse1 {height: 128vh;}.z2d2 {width: 100% !important;margin-bottom: 20px;}.z2d1 {flex-wrap: wrap;}.z3d1 {width: 100%;}.z5d1 {flex-wrap: wrap;}.zd5d2 {width: 100%;}}
    </style>
@endsection

@section('content')
    <section id="zse1">
        <div class="zd1">
            <h1 class="zh1">Find Your Ideal Stay in <br> Paradise</h1>
            <p>Discover the Perfect Accommodation for Your Dream Vacation</p>
            <div class="zd2">
                <form id="zfm1" action="{{route('web.page.list')}}" method="GET" style="display: flex;align-items: center;width: 100%;justify-content: space-between;">
                <div class="zd3">

                 
         
                    <input type="text" class="zin1" id="dates" placeholder="checkin/checkout" />
                    <input type="hidden" name="checkIn" id="checkin" />
                    <input type="hidden" name="checkOut" id="checkout" />
                    <div id="datepicker"></div>
                    <select name="destination" class="zin1" id="city" >
                        <option class="op" value="">City</option>
                        @foreach($destinations as $key => $destination)
                            <option class="op" style="text-align: left" value="{{$destination->id}}">{{$destination->name_en}}</option>
                        @endforeach
                    </select>
                    <input id="Guest"  name="adult" required type="number" class="zin1" placeholder="Number of Guest">
                </div>
                <button id="sbt" type="submit" class="bt1">Search</button>
                </form>
            </div>

        </div>
            
    </section>

    <section id="z2se2">
        <div class="w">
            <h1 class="z2h1">Destinations</h1>
            <p style="color: #000000;">Discover the Perfect Accommodation for Your Dream Vacation</p>
            @php
                $class = [1,2,3,1,2,3];
            @endphp
            <div class="z2d1" style="    margin-top: 40px;">
                @foreach($propertiesDestinations as $key => $PropertyDestination)
                    @if($key <= 2)
                        <div class="z2d2 z2d1-{{$class[$key]}}"
                             style="background: url({{asset('web/img/destinations/'.$PropertyDestination->district->url.'.jpg')}});background-size: cover;background-position: center;">
                            <div class="z2d4">
                                <a href="list?destination={{$PropertyDestination->district->id}}"><h2 class="z2h2">{{$PropertyDestination->district->name_en}}</h2></a>
                                <span class="z2s1">{{$uniquePropertyCount[$PropertyDestination->main_location]}} Properties</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="z2d1" id="z2d3">

                @foreach($propertiesDestinations as $key => $PropertyDestination)

                    @if( $key > 2 && $key <= 5)
                        <div class="z2d2 z2d1-{{$class[$key]}}"
                             style="background: url({{asset('web/img/destinations/'.$PropertyDestination->district->url.'.jpg')}});;background-size: cover;background-position: center;">
                            <div class="z2d4">
                                <a href="list?destination={{$PropertyDestination->id}}"><h2 class="z2h2">{{$PropertyDestination->district->name_en}}</h2></a>
                                <span class="z2s1">{{$uniquePropertyCount[$PropertyDestination->main_location]}} Properties</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="z3se1">
        <div class="w">
            <h1 class="z3h1">Find Your Perfect Accommodation</h1>
            <p style="color: #000000;">Discover the Perfect Accommodation for Your Dream Vacation</p>
            <div class="fsb" style="flex-wrap: wrap;    margin-top: 40px;">
                @foreach($propertyTypes as $key => $PropertyType)
                    <div class="z3d1">
                        <img class="z3i1" src="{{asset('web/img/property-type/'.$PropertyType->name.'.jpg')}}"
                             alt="Find-Your-Perfect-Accommodation-Hotels">
                        <a  href="list?ptpt%5B%5D={{$PropertyType->id}}"><h2 style="color: black;font-weight: 400;margin-top: 0px;padding: 6px 0;"  class="z3h2">{{$PropertyType->name}}</h2></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="z4se1">
        <div class="w">
            <div class="z4d1">
                <hgroup id="z4hg1">
                    <p id="z4p1">Unlock More Value with Every Booking!</p>
                    <h1 id="z4h1">Earn and Spend Points on Your Next Getaway!</h1>
                </hgroup>
                <a href="{{route('points.buy')}}" class="z4a1">Join the Points Revolution!</a>
            </div>
        </div>
    </section>

    <section id="z6se1">
        <div class="w wrapper">

            <h1 class="z5h1">Top rated hotels</h1>
            <p style="color: #000000;">Enjoy your valuable days with comfortable zone</p>
            <ul class="carousel" style="    margin-top: 40px;">

                @foreach($PromotionBar01 as $PromotionCard)
                    @php
                        $image_array = explode(',', $PromotionCard->image);
                        $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                    @endphp
                    <li class="card">
                        <div class="x1d1" style="width:100%">
                            <div class="x1d2" style="background: url({{asset('Property/Images/'.$image_array[0])}});  background-size: cover;">
                                <div class="x1d3">
                                </div>
                                <div class="x1d4">
                                    <img id="id_{{$PromotionCard->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{in_array($PromotionCard->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                </div>
                            </div>
                            <div class="xid5">
                                <a href="{{route('web.page.detail',$PromotionCard->id)}}"><h2 class="x1h2">{{$PromotionCard->name}}</h2></a>
                                <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;font-size: 16px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section id="z7se1">
        <div class="z7d1" id="z7d3">
            <div class="z7d4">
                <h1 class="z7h1">Honeymoon Haven</h1>
                <p class="z7p1">Romantic Escapes at Unbeatable Prices!</p>
            </div>
        </div>
        <div class="z7d1" id="z7d2">
            <div class="z7d4">
                <h1 class="z7h1">Weekend Getaway Bonanza</h1>
                <p class="z7p1">Your Ticket To Relaxation!</p>
            </div>
        </div>
    </section>

   <section id="z8se1">
        <div class="w">
            <h1 class="z5h1">Explore Our Top-rated Stays</h1>
            <p style="color: #000000;">Discover the Perfect Accommodation for Your Dream Vacation</p>
            

            <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                   
                        @foreach($PromotionBar01 as $PromotionCard)
                            @php
                                $image_array = explode(',', $PromotionCard->image);
                                $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                            @endphp
                             <div class="card swiper-slide">
                               <div class="image-content">
                                    <span class="overlay" style="background: url('{{asset("Property/Images/".$image_array[0])}}');  background-size: cover;"></span>
                                    <div class="x1d4" style=" position: absolute; left:10px;top: 6px;">
                                        <img id="id_{{$PromotionCard->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{in_array($PromotionCard->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                    </div>

                                 <div class="card-image">
                                    <!-- <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjxivAs4UknzmDfLBXGMxQkayiZDhR2ftB4jcIV7LEnIEStiUyMygioZnbLXCAND-I_xWQpVp0jv-dv9NVNbuKn4sNpXYtLIJk2-IOdWQNpC2Ldapnljifu0pnQqAWU848Ja4lT9ugQex-nwECEh3a96GXwiRXlnGEE6FFF_tKm66IGe3fzmLaVIoNL/s1600/img_avatar.png" alt="" class="card-img"> -->
                                    </div> 
                                </div>

                                <div class="card-content">
                                    <h2 class="name">{{$PromotionCard->name}}</h2>
                                    <p class="description">{{$PromotionCard->description}}</p>

                                    <button class=" bt1">View More</button>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
    
@endsection

@section('js')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
     <script src="{{asset('web/js/js.js')}}"></script>
     <script src="{{asset('web/js/slide2.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/slider/slider.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <script>
        var vish_elements = document.querySelectorAll('.x1i1');

            vish_elements.forEach(function(element) {
            element.addEventListener('click', function() {
                var dataInfo = this.getAttribute('data-id');
                var url = this.getAttribute('data-url');
                var baseUrl = "https:\/\/test.satasmewebdev.online";

                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText){
                            // document.getElementById('id_'+dataInfo).style.background = '#b01010'
                            document.getElementById('id_' + dataInfo).src = baseUrl+'/web/heart.png';
                        }else{
                            // document.getElementById('id_'+dataInfo).style.background = '#161515ad'
                            document.getElementById('id_' + dataInfo).src = baseUrl+'/web/heart2.png';
                        }
                    }
                }

                xmlhttp.open("GET",url,true);
                xmlhttp.send();
            });
        });
    </script>


@endsection


