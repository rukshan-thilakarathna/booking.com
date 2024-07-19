@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

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
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-content">
                        <div class="title">
                            <div class="left">
                                <h1>{{$property->name}}<span class="rating"><i class="fa fa-star"></i>9.9</span></h1>
                                <h3><a href="#">{{$property->district->name_en}}</a></h3>
                            </div>
                            <div class="right">
                                <a href="#map" class="icon scroll"><i class="fa fa-map-marker"></i>See on the map</a>
                                <a href="#availability" class="btn btn-primary btn-rounded scroll">Reserve Today</a>
                            </div>
                        </div>
                        <!--end title-->
                        <section id="gallery">
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
                        </section>
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
                                <section id="map">
                                    <h2>Map</h2>
                                    <div id="map-item" class="map height-300 box"></div>
                                </section>
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
                                                <th>Today's price</th>
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
                                                        <li>Rs {{$room->display_price}}</li>
                                                    </ul>
                                                </td>
                                                <td class="price">
                                                    <ul>
                                                        @php
                                                            $dates = (new \App\Models\Availability())->getDate(strtotime($UrlData['chackIn']),strtotime($UrlData['chackOut']));
                                                        @endphp
                                                        <li>Rs {{$room->display_price*count($dates['DateList'])}}</li>
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
                createAnchor('{{ $payNowUrl }}', 'Pay Now', 'modalbody');
                createAnchor('{{ $payLaterUrl }}'.replace('DATA_VALUE_PLACEHOLDER', dataValue), 'Pay Later', 'modalbody');
            @else
                createAnchor('{{ $payNowUrl }}', 'Pay Now', 'modalbody');
            @endif
        }
    });
});
    </script>

@endsection
