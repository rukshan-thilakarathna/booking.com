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
    width: 1250px;
  }
}
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
                        <div class="title">
                            <div class="left">
                                <h1>{{$property->name}}<span class="rating"><img id="id_{{$property->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $property->id) }}"  data-id="{{$property->id}}" src="{{in_array($property->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1"></span></h1>
                                <h3><a href="#">{{$property->district->name_en}}</a></h3>
                            </div>
                            <div class="right">
                                <a href="#map" class="icon scroll"><i class="fa fa-map-marker"></i>See on the map</a>
                                <a href="#availability" class="btn btn-primary btn-rounded scroll">Reserve Today</a>
                            </div>
                        </div>
                        <main>
                            <div class="container">
                            <div id="gallery" class="photos-grid-container gallery">
                                <div class="main-photo img-box">
                                <a href="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=1200&&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1800&h=1800&&q=80" alt="image" /></a>
                                </div>
                                <div>
                                <div class="sub">
                                    <div class="img-box"><a href="https://images.unsplash.com/photo-1588186941799-f9a4fc54ff1e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1588186941799-f9a4fc54ff1e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=900&h=900&q=80" alt="image" /></a></div>
                                    <div class="img-box"><a href="https://images.unsplash.com/photo-1593409981958-562665d407cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1593409981958-562665d407cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=900&h=900&q=60" alt="image" /></a></div>
                                    <div class="img-box"><a href="https://images.unsplash.com/photo-1587538639284-aec1076ba9c2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1587538639284-aec1076ba9c2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=900&h=900&q=60" alt="image" /></a></div>
                                    <div id="multi-link" class="img-box">
                                    <a href="https://images.unsplash.com/photo-1591557304122-513e396f9feb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzZ8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image">
                                        <img src="https://images.unsplash.com/photo-1591557304122-513e396f9feb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzZ8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=900&h=900&q=80" alt="image" />
                                        <div class="transparent-box">
                                        <div class="caption">
                                            +3
                                        </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div id="more-img" class="extra-images-container hide-element">
                                <a href="https://images.unsplash.com/photo-1523450001312-faa4e2e37f0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODF8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1523450001312-faa4e2e37f0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODF8fHdvbWVuJTIwc2hvcHBpbmd8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=900&h=900&q=60" alt="image" /></a>
                                <a href="https://images.unsplash.com/photo-1484081064812-86e90e107fa8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTQ4fHx3b21lbiUyMHNob3BwaW5nfGVufDB8fDB8fHww&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1484081064812-86e90e107fa8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTQ4fHx3b21lbiUyMHNob3BwaW5nfGVufDB8fDB8fHww&auto=format&fit=crop&w=900&h=900&q=60" alt="image" /></a>
                                <a href="https://images.unsplash.com/photo-1466695108335-44674aa2058b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&h=1200&q=80" class="glightbox" data-glightbox="type: image"><img src="https://images.unsplash.com/photo-1466695108335-44674aa2058b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=900&h=900&q=80" alt="image" /></a>
                        
                                </div>
                            </div>
                            </div>
                        </main>
                        <!--end title-->
                        <!-- <section id="gallery">
                            <div class="gallery-detail">
                                <div class="one-item-carousel">
                                    @php
                                        $image_array = explode(',', $property->image);
                                    @endphp
                                    <img {{count($image_array)}} src="{{asset('Property/Images/'.$image_array[0])}}" alt="">

                                    @foreach($image_array as $key => $image)
                                        @if($key>0)
                                            <div class="image">
                                                <img src="{{asset('Property/Images/'.$image)}}" alt="">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section> -->
                        <h2>Description</h2>
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
                                        <div class="form-group">
                                            <label for="form-availability-check-in">Check In </label>
                                            <input required style="height: 34px;" value="{{$UrlData['chackIn'] ?? ''}}"  type="date" class="form-control" id="form-availability-check-in" name="checkIn" placeholder="Check In">
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-availability-check-out">Check Out</label>
                                            <input required style="height: 34px;" value="{{$UrlData['chackOut'] ?? ''}}" type="date" class="form-control" id="form-availability-check-out" name="checkOut" placeholder="Check In">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-availability-check-out">Adults</label>
                                            <input  required type="number" value="{{$UrlData['adults'] ?? 0}}" class="form-control" id="form-availability-check-out" name="adults" placeholder="Check In">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-availability-check-out">Children</label>
                                            <input required type="number" value="{{$UrlData['children'] ?? 0}}" class="form-control" id="form-availability-check-out" name="children" placeholder="Check In">
                                        </div>
                                    </div>

                                    <!--end col-md-3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="invisible">Hidden label</label>
                                            <button type="submit" class="btn btn-primary btn-rounded btn-framed form-control">Search</button>
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
                                <div style="margin-bottom: 27px;background: #07393f;padding: 26px;color: white;">
                                    <h3>{{$roomType->name}}<a target="_blank" href="{{route('web.page.property-type-detail',$roomType->id)}}" class="btn btn-primary btn-rounded pull-right scroll">More Information</a></h3>
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
                                                            @for($i = 0; $i < $room->adults; $i++)
                                                                <i class="fa fa-user"></i>
                                                            @endfor
                                                        </li>
                                                        <li>Children - {{$room->Children}}
                                                            @for($i = 0; $i < $room->Children; $i++)
                                                                <i class="fa fa-user"></i>
                                                            @endfor
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
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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
@endsection
