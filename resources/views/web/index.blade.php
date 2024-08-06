@extends('web.Blocks.layout')

@section('content')
    <style>
        p{color: white}
    </style>

{{--{{dd(Session::get('user'))}}--}}

    <section id="zse1">
        <div class="zd1">
            <h1 class="zh1">Find Your Ideal Stay in <br> Paradise</h1>
            <p>Discover the Perfect Accommodation for Your Dream Vacation</p>
            <div class="zd2">
                <form id="zfm1" action="{{route('web.page.list')}}" method="GET" style="display: flex;align-items: center;width: 100%;justify-content: space-between;">
                <div class="zd3">

                    <input  name="checkIn" required type="date" class="zin1" onfocus="this.placeholder='Select a date'">
                    <input name="checkOut" required type="date" class="zin1" placeholder="Check Out">
                    <select name="destination" class="zin1" >
                        <option class="op" value="">Destinations</option>
                        @foreach($destinations as $key => $destination)
                            <option class="op" style="text-align: left" value="{{$destination->id}}">{{$destination->name_en}}</option>
                        @endforeach
                    </select>
                    <input id="Guest"  name="adult" required type="number" class="zin1" placeholder="Guest">
                </div>
                <button id="sbt" type="submit" class="bt1">Search</button>
                </form>
            </div>
        </div>
    </section>



    <section id="z2se2">
        <div class="w">
            <h1 class="z2h1">Destinations</h1>
            @php
                $class = [1,2,3,1,2,3];
            @endphp
            <div class="z2d1">
                @foreach($propertiesDestinations as $key => $PropertyDestination)
                    @if($key <= 2)
                        <div class="z2d2 z2d1-{{$class[$key]}}"
                             style="background: url({{asset('web/img/destinations/'.$PropertyDestination->district->url.'.jpg')}});background-size: cover;background-position: center;">
                            <div class="z2d4">
                                <a href="list?destination={{$PropertyDestination->id}}"><h2 class="z2h2">{{$PropertyDestination->district->name_en}}</h2></a>
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
            <div class="fsb" style="
    flex-wrap: wrap;
">
                @foreach($propertyTypes as $key => $PropertyType)
                    <div class="z3d1">
                        <img class="z3i1" src="{{asset('web/img/property-type/'.$PropertyType->name.'.jpg')}}"
                             alt="Find-Your-Perfect-Accommodation-Hotels">
                        <a  href="list?ptpt%5B%5D={{$PropertyType->id}}"><h2 style="color: black;font-weight: 600;margin-top: 0px;background: #cbcbcb;padding: 6px 0;"  class="z3h2">{{$PropertyType->name}}</h2></a>
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

    <section id="z5se1">
        <div class="w">
            <h1 class="z5h1">Why Choose Barterbed</h1>
            <div class="z5d1">
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Extensive-Selection.svg')}}" alt="Extensive Selection"
                         class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Secure-and-Convenient-Booking.svg')}}"
                         alt="Secure and Convenient Booking" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Personalized-Recommendations.svg')}}"
                         alt="Personalized Recommendations" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="z6se1">
        <div class="w wrapper">
            <ul class="carousel">

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
                                    <img id="id_{{$PromotionCard->id}}" style="background: {{in_array($PromotionCard->id,$wishlist_array) ? '#b01010' : '#161515ad'}} ;border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                                </div>
                            </div>
                            <div class="xid5">
                                <a href="{{route('web.page.detail',$PromotionCard->id)}}"><h2 class="x1h2">{{$PromotionCard->name}}</h2></a>
                                <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
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
                <h1 class="z7h1">Honeymoon Haven</h1>
                <p class="z7p1">Romantic Escapes at Unbeatable Prices!</p>
            </div>
        </div>
    </section>

    <section id="z8se1">
        <div class="w">
            <h1 class="z5h1">Explore Our Top-rated Stays</h1>
            <div class="z8d1">
                <div class="w wrapper">
                    <ul class="carousel">

                        @foreach($PromotionBar02 as $PromotionCard)
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
                                            <img id="id_{{$PromotionCard->id}}" style="background: {{in_array($PromotionCard->id,$wishlist_array) ? '#b01010' : '#161515ad'}} ;border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                                        </div>
                                    </div>
                                    <div class="xid5">
                                        <a href="{{route('web.page.detail',$PromotionCard->id)}}"><h2 class="x1h2">{{$PromotionCard->name}}</h2></a>
                                        <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection


