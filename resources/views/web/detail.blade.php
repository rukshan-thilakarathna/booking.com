@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

@section('links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('web/assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/assets/fonts/elegant-fonts.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/zabuto_calendar.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{asset('web/assets/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/slider/slider.css?fd')}}" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('web/css/slide2.css?fd')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/css/dates.css?fd')}}" type="text/css">
@endsection

@section('style')
<style>
@import url("https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap");

.photos-grid-container {
  height: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0;
  align-items: start;
}
@media (max-width: 580px) {
  .photos-grid-container {
    grid-template-columns: 1fr;
  }
}
.photos-grid-container .img-box {
  border: 1px solid #ffffff;
  position: relative;
}
.photos-grid-container .img-box:hover .transparent-box {
  background-color: rgba(0, 0, 0, 0.6);
}
.photos-grid-container .img-box:hover .caption {
  transform: translateY(-5px);
}
.photos-grid-container img {
  max-width: 100%;
  display: block;
  height: auto;
}
.photos-grid-container .caption {
  color: white;
  transition: transform 0.3s ease, opacity 0.3s ease;
  font-size: 1.5rem;
}
.photos-grid-container .transparent-box {
  height: 100%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  top: 0;
  left: 0;
  transition: background-color 0.3s ease;
  display: flex;
  justify-content: center;
  align-items: center;
}
.photos-grid-container .main-photo {
  grid-row: 1;
  grid-column: 1;
}
.photos-grid-container .sub {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  grid-gap: 0em;
}
.photos-grid-container .sub:nth-child(0) {
  grid-column: 1;
  grid-row: 1;
}
.photos-grid-container .sub:nth-child(1) {
  grid-column: 2;
  grid-row: 1;
}
.photos-grid-container .sub:nth-child(2) {
  grid-column: 1;
  grid-row: 2;
}
.photos-grid-container .sub:nth-child(3) {
  grid-column: 2;
  grid-row: 2;
}

.hide-element {
  border: 0;
  clip: rect(1px 1px 1px 1px);
  /* IE6, IE7 */
  clip: rect(1px, 1px, 1px, 1px);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

@media screen and (min-width: 1280px) {
  .container {
    margin: 0 auto;
    padding: 0;
    width: 1110px;
  }
}

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
    </style>
@endsection

@section('content')
    <div id="page-content">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('web.page.list')}}">Listing</a></li>
                <li class="active">Detail</li>
            </ol>
                @php
                    $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                @endphp
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-content">
                        
                        <main style="margin-bottom: 30px;position: relative;">
                            <span style="position: absolute;top: 0;z-index: 5;right: 0;" class="rating"><img id="id_{{$property->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $property->id) }}"  data-id="{{$property->id}}" src="{{in_array($property->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1"></span>
                                    @php
                                        $image_array = explode(',', $property->image);
                                    @endphp 
                            <div class="container">
                                <div id="gallery" class="photos-grid-container gallery">
                                    <div class="main-photo img-box" style="background: url('{{asset('Property/Images/'.$image_array[1])}}');">
                                        <a href="{{asset('Property/Images/'.$image_array[0])}}" class="glightbox" data-glightbox="type: image">
                                            <img src="{{asset('Property/Images/'.$image_array[0])}}" alt="">  
                                        </a>
                                    </div>
                                <div>
                                <div class="sub">
                                    <div class="img-box">
                                        <a href="{{asset('Property/Images/'.$image_array[1])}}" class="glightbox" data-glightbox="type: image">
                                            <img src="{{asset('Property/Images/'.$image_array[1])}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="img-box">
                                        <a href="{{asset('Property/Images/'.$image_array[2])}}" class="glightbox" data-glightbox="type: image">
                                            <img src="{{asset('Property/Images/'.$image_array[2])}}" alt="image" />
                                        </a>
                                    </div>
                                    <div class="img-box">
                                        <a href="{{asset('Property/Images/'.$image_array[3])}}" class="glightbox" data-glightbox="type: image">
                                            <img src="{{asset('Property/Images/'.$image_array[3])}}" alt="image" />
                                        </a>
                                    </div>
                                    <div id="multi-link" class="img-box">
                                        <a href="{{asset('Property/Images/'.$image_array[4])}}" class="glightbox" data-glightbox="type: image">
                                            <img src="{{asset('Property/Images/'.$image_array[4])}}" alt="image" />
                                            @if (count($image_array) > 5)
                                                <div class="transparent-box">
                                                    <div class="caption">
                                                        +{{count($image_array) - 5}}
                                                    </div>
                                                </div>
                                            @endif
                                            
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <div id="more-img" class="extra-images-container hide-element">
                                    @foreach($image_array as $key => $image)
                                        @if($key>0)
                                        <a href="{{asset('Property/Images/'.$image_array[4])}}" class="glightbox" data-glightbox="type: image"><img src="{{asset('Property/Images/'.$image_array[4])}}" alt="image" /></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </main>

                        <div class="title">
                            <div class="left">
                                <h1>{{$property->name}} In {{$property->district->name_en}}</h1>
                                <h3><a href="#">{{$property->propertyType->name}}</a></h3>
                            </div>
                            <div class="right">
                                <a href="#map" class="btn btn-primary btn-rounded scroll">See on the map</a>
                                <a href="#availability" class="btn btn-primary btn-rounded scroll">Reserve Now</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <section id="description">
                                    <p>{{$property->description}}</p>
                                </section>
                                <section id="facilities">
                                    <h2>Facilities</h2>
                                    <ul class="bullets half">
                                        @php
                                            $facilities_array = explode(',', $property->facilities);
                                        @endphp
                                        @foreach(config('constants.PropertyFacility') as $key => $PropertyFacility)
                                            @if(in_array($key,$facilities_array))
                                                <li>{{$PropertyFacility}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </section>
                                @if($property->location != null)
                                <section id="map">
                                    <h2>Map</h2>
                                    <div>
                                        <iframe src="{{$property->location}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </section>
                                @endif
                            </div>

                            <!--end col-md-8-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background: #ffdb23;padding-top: 16px;margin-bottom: 40px;">
        <div class="container">
        <section id="availability">
                            <h2>Availability</h2>
                            @if($error != 0)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endif

                            <form style="margin-bottom: 50px; class="labels-uppercase" id="form-availability">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" style="background:#f5f5f5a3;padding: 15px;border-radius: 6px;margin: 0;">
                                            <label for="form-availability-check-in">Check In </label>
                                            <input required style="height: 34px;" value="{{$UrlData['chackIn'] ?? ''}}"  type="date" class="form-control" id="form-availability-check-in" name="checkIn" placeholder="Check In">
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3">
                                        <div class="form-group" style="background:#f5f5f5a3;padding: 15px;border-radius: 6px;margin: 0;">
                                            <label for="form-availability-check-out">Check Out</label>
                                            <input required style="height: 34px;" value="{{$UrlData['chackOut'] ?? ''}}" type="date" class="form-control" id="form-availability-check-out" name="checkOut" placeholder="Check In">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group" style="background:#f5f5f5a3;padding: 15px;border-radius: 6px;margin: 0;">   
                                            <label for="form-availability-check-out">Adults</label>
                                            <input  required type="number" value="{{$UrlData['adults'] ?? 0}}" class="form-control" id="form-availability-check-out" name="adults" placeholder="Check In">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group" style="background:#f5f5f5a3;padding: 15px;border-radius: 6px;margin: 0;">
                                            <label for="form-availability-check-out">Children</label>
                                            <input required type="number" value="{{$UrlData['children'] ?? 0}}" class="form-control" id="form-availability-check-out" name="children" placeholder="Check In">
                                        </div>
                                    </div>

                                    <!--end col-md-3-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="invisible">Hidden label</label>
                                            <button type="submit" style="height: 45px;" class="btn btn-primary form-control">Search</button>
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                </div>
                                <!--end row-->
                            </form>

                            @foreach($roomTypes as $key => $roomType)
                                @php
                                    $isHasRooms = Rooms::where('room_type_id',$roomType->id)->count();
                                @endphp
                            @if($isHasRooms > 0 && $CheckAvailability)
                                <div style="margin-bottom: 27px;background: #ffdb23;padding: 26px;color: #000000;border-radius: 10px;">
                                    <h3 style="display: flex;justify-content: space-between;align-items: center;font-size: 25px;">{{$roomType->name}}<a target="_blank" href="{{route('web.page.property-type-detail',$roomType->id)}}" class="btn btn-primary btn-rounded pull-right scroll">More Information</a></h3>
                                    <p style="padding: 7px 0;">{{$roomType->disription}}</p>
                                </div> 
                                @php
                                    $rooms = Rooms::where('room_type_id',$roomType->id)->get();
                                @endphp
                                <div style="margin-bottom: 30px" class="form-reservations">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Number of Room</th>
                                                <th>Number of guests</th>
                                                <th>Today price</th>
                                                <th>Total price</th>
                                                <th>Open Points</th>
                                                <th>Your choices</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    @foreach($rooms as $key => $room)
                                        @if(in_array($room->number , $AvailabileRooms) )

                                        <table class="table">
                                            <tbody>
                                            <tr class="room">
                                                <td class="persons">{{$room->number}}</td>
                                                <td class="persons">
                                                    <ul>
                                                        <li>Adults - {{$room->adults}}
                                                            
                                                        </li>
                                                        <li>Children - {{$room->Children}}
                                                           
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="price">
                                                    <ul>
                                                        @php
                                                            $dates = (new \App\Models\Availability())->getDate(strtotime($UrlData['chackIn']),strtotime($UrlData['chackOut']));
                                                        @endphp
                                                        <li>$ {{$room->display_price}}</li>
                                                    </ul>
                                                </td>
                                                <td class="price">
                                                    <ul>
                                                        @php
                                                            $dates = (new \App\Models\Availability())->getDate(strtotime($UrlData['chackIn']),strtotime($UrlData['chackOut']));
                                                        @endphp
                                                        <li>$ {{$room->display_price*count($dates['DateList'])}}</li>
                                                    </ul>
                                                </td>
                                                <td class="price">
                                                    <input readonly type="checkbox" @if($room->open_point_or_cash == 0) checked @endif>
                                                </td>
                                                <td class="rooms">
                                                    {{$room->user_choice}}
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button"  data-toggle="modal" data-value="{{$room->id}}" data-target="#exampleModalCenter"  class="zbt1 btn btn-primary btn-rounded">Reserve Now</button>
                                                    </div>
                                                    <!--end form-group-->
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                            <!--end form-reservations-->
                        </section>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-content">
                        
                        
                        <section id="reviews">
                            <div class="title">
                                <h2 class="pull-left">Reviews</h2>
                            </div>
                            <div class="reviews">
                                @foreach($reviews as $review)
                                    @if($review->guest_id == null)
                                        <div class="review">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <aside class="name">{{$review->postedUser->name}}</aside>
                                                    <aside >{{$review->created_at}}</aside>
                                                </div>
                                                <!--end col-md-3-->
                                                <div class="col-md-9">
                                                    <div class="comment">
                                                        <p>{{$review->text}}</p>
                                                    </div>
                                                    <!--end comment-->
                                                </div>
                                                <!--end col-md-9-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <!--end reviews-->
                        </section>

                        <section id="z6se1">
                            <div class="w wrapper" style="width: 100%;">

                                <h1 class="z5h1">Top rated hotels</h1>
                                <p style="color: #000000;">Enjoy your valuable days with comfortable zone</p>
                                <ul class="carousel" style="    margin-top: 40px;">

                                    @foreach($PromotionBar01 as $PromotionCard)
                                        @php
                                            $image_array = explode(',', $PromotionCard->image);
                                            $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                                        @endphp
                                        <li    class="card">
                                            <div class="x1d1" style="width:100%">
                                                <div class="x1d2" style="background: url({{asset('Property/Images/'.$image_array[0])}});  background-size: cover;">
                                                    <div class="x1d3">
                                                    </div>
                                                    <div class="x1d4">
                                                        <img id="id_{{$PromotionCard->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{in_array($PromotionCard->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                                    </div>
                                                </div>
                                                <div class="xid5">
                                                    <h2 onclick="window.location.href='{{route('web.page.detail',$PromotionCard->id)}}';" class="x1h2">{{$PromotionCard->name}}</h2>
                                                    <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;font-size: 16px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>

                    </div>
                    <!--end main-content-->
                </div>
                <!--end col-md-9-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
    <!--end page-content-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Booking Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalbody">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

@endsection

@section('js')
    <script>
        // Function to create a new anchor tag
        function createAnchor(href, textContent, parentElementId) {
            // Create the new anchor element
            var newAnchor = document.createElement('a');
            // Set the href attribute of the new anchor
            newAnchor.href = href;
            newAnchor.style.marginRight = '10px';
            // Set the text content of the new anchor
            newAnchor.textContent = textContent;
            // Get the parent element by its ID
            var parentElement = document.getElementById(parentElementId);
            newAnchor.className = 'btn btn-primary btn-lg active';
            // Append the new anchor to the parent element

            parentElement.appendChild(newAnchor);
        }
    </script>

    <script>
        var modalbody = document.getElementById('modalbody')
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the document or a parent element that contains the button
            document.addEventListener('click', function(event) {
                // Check if the clicked element is the "Reserve Now" button
                if (event.target.matches('.zbt1[data-value]')) {
                    // Get the data-value attribute of the clicked button
                    var dataValue = event.target.getAttribute('data-value');

                    // Clear the modal body
                    while (modalbody.firstChild) {
                        modalbody.removeChild(modalbody.firstChild);
                    }

                    // Dynamically add anchors based on PHP logic
                    @php
                        $start_date = new DateTime(date('Y-m-d'));
                        $end_date = new DateTime($UrlData['chackIn']);

                        // Include end date in the interval count
                        $end_date->modify('+1 day');

                        // Create an interval of 1 day
                        $interval = new DateInterval('P1D');

                        // Create a date period
                        $daterange = new DatePeriod($start_date, $interval, $end_date);

                        // Count the number of dates
                        $date_count = iterator_count($daterange);

                        $payNowUrl = route('web.page.index');
                        $payLaterUrl = route('web.booking.confourm', [
                            'id' => 'DATA_VALUE_PLACEHOLDER',
                            'chackIn' => $UrlData['chackIn'] ?? 0,
                            'chackOut' => $UrlData['chackOut'] ?? 0,
                            'adults' => $UrlData['adults'] ?? 0,
                            'children' => $UrlData['children'] ?? 0,
                        ]);
                    @endphp

                    @if($date_count > 14 && isset(Session::get('user')['id']))
                        //createAnchor('{{ $payNowUrl }}', 'Pay Now', 'modalbody');
                        createAnchor('{{ $payLaterUrl }}'.replace('DATA_VALUE_PLACEHOLDER', dataValue), 'Pay Later', 'modalbody');
                    @else
                        createAnchor('{{ $payNowUrl }}', 'Pay Now', 'modalbody');
                    @endif
                }
            });
        });
    </script>

    <script type="text/javascript" src="{{asset('web/assets/js/jquery-2.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/infobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/markerclusterer_packed.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/richmarker-compiled.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/markerwithlabel_packed.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/icheck.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/masonry.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/js/maps.js')}}"></script>
    <script src="{{asset('web/assets/js/ie.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>


    <script>
    const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    width: "90vw",
    height: "90vh"
    });
    </script>

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
     <script src="{{asset('web/js/slide2.js')}}"></script>
     <script src="{{asset('web/js/js.js')}}"></script>
     <script src="{{asset('web/js/slide2.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/assets/slider/slider.js')}}"></script>
@endsection
