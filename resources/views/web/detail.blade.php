@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('web.page.list')}}">Listing</a></li>
                <li class="active">Detail</li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="quick-navigation" data-fixed-after-touch="">
                        <div class="wrapper">
                            <ul>
                                <li><a href="#description" class="scroll">Description</a></li>
                                <li><a href="#map" class="scroll">Map</a></li>
                                <li><a href="#facilities" class="scroll">Facilities</a></li>
                                <li><a href="#additional-information" class="scroll">Additional Information</a></li>
                                <li><a href="#reviews" class="scroll">Reviews</a>(23)</li>
                            </ul>
                        </div>
                    </div>
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
                            <form style="margin-bottom: 50px; class="labels-uppercase" id="form-availability">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-availability-check-in">Check In</label>
                                            <input type="text" class="form-control date" id="form-availability-check-in" name="check-in" placeholder="Check In">
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-availability-check-out">Check In</label>
                                            <input type="text" class="form-control date" id="form-availability-check-out" name="check-out" placeholder="Check In">
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
                            @if($isHasRooms > 0)
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
                                                <th>Your choices</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    @foreach($rooms as $key => $room)
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
                                                <td class="price">LKR {{$room->display_price}}</td>
                                                <td class="rooms">
                                                    {{$room->user_choice}}
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-rounded">Reserve Now</button>
                                                    </div>
                                                    <!--end form-group-->
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    @endforeach

                                </div>
                                @endif
                            @endforeach
                            <!--end form-reservations-->
                        </section>
                        <section id="reviews">
                            <div class="title">
                                <h2 class="pull-left">Reviews</h2>
                                <a href="#write-a-review" class="btn btn-primary btn-rounded pull-right scroll">Write a Review</a>
                            </div>
                            <h3>Overall Score</h3>
                            <ul class="rating-score">
                                <li class="overall"><i class="fa fa-star"></i>9.9</li>
                                <li><span>9.6</span>
                                    <figure>Cleanliness</figure>
                                </li>
                                <li><span>10</span>
                                    <figure>Comfort</figure>
                                </li>
                                <li><span>9.4</span>
                                    <figure>Location</figure>
                                </li>
                                <li><span>9.8</span>
                                    <figure>Facilities</figure>
                                </li>
                                <li><span>10</span>
                                    <figure>Staff</figure>
                                </li>
                                <li><span>10</span>
                                    <figure>Value for money</figure>
                                </li>
                            </ul>
                            <div class="reviews">
                                <div class="review">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <aside class="name">John Doe</aside>
                                            <aside class="date">10.03.2015</aside>
                                        </div>
                                        <!--end col-md-3-->
                                        <div class="col-md-9">
                                            <div class="comment">
                                                <div class="comment-title">
                                                    <figure class="rating">9.5</figure>
                                                    <h4>Beautiful Holiday</h4>
                                                </div>
                                                <!--end title-->
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod.
                                                    Suspendisse at dui sit amet felis commodo dictum. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                    Integer commodo eleifend erat, vitae tincidunt urna volutpat et.
                                                    Mauris laoreet, sem ut sodales sodales, massa turpis posuere lectus, non
                                                    aliquet massa nisl ac orci.
                                                </p>
                                                <div class="clearfix options">
                                                    <span class="pull-left"><a href="" class="btn btn-framed btn-default btn-rounded btn-small icon"><i class="fa fa-thumbs-up font-color-default"></i>3</a>Helpful Review?</span>
                                                    <span class="pull-right"><a href="" class="link icon font-color-grey"><i class="fa fa-flag"></i>Report</a></span>
                                                </div>
                                                <!--end options-->
                                                <div class="answer">
                                                    <h4>James Green, CEO of the Mountain Paradise Hotel</h4>
                                                    <p>Phasellus venenatis vel orci et lacinia. Duis sollicitudin arcu et hendrerit
                                                        tempor. Aliquam at urna fringilla, auctor tellus eget, vehicula lorem.
                                                        Pellentesque ornare faucibus sapien eget max
                                                    </p>
                                                </div>
                                                <!--end answer-->
                                            </div>
                                            <!--end comment-->
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end review-->
                                <div class="review">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <aside class="name">Peter Green</aside>
                                            <aside class="date">10.03.2015</aside>
                                        </div>
                                        <!--end col-md-3-->
                                        <div class="col-md-9">
                                            <div class="comment">
                                                <div class="comment-title">
                                                    <figure class="rating">9.8</figure>
                                                    <h4>Very Good Hotel</h4>
                                                </div>
                                                <!--end title-->
                                                <p>In eleifend odio vel augue mattis, et pharetra dolor ullamcorper. Nulla
                                                    ut porttitor mauris. Sed tincidunt, urna non cursus suscipit, quam velit
                                                    laoreet libero, sit amet tincidunt ex nunc eget eros.
                                                </p>
                                                <div class="clearfix options">
                                                    <span class="pull-left"><a href="" class="btn btn-framed btn-default btn-rounded btn-small icon"><i class="fa fa-thumbs-up font-color-default"></i>10</a>Helpful Review?</span>
                                                    <span class="pull-right"><a href="" class="link icon font-color-grey"><i class="fa fa-flag"></i>Report</a></span>
                                                </div>
                                                <!--end options-->
                                            </div>
                                            <!--end comment-->
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end review-->
                            </div>
                            <!--end reviews-->
                        </section>
                        <section id="write-a-review">
                            <h2>Write a Review</h2>
                            <form  class="labels-uppercase clearfix" id="form_reply_1">
                                <div class="alert alert-dark fade in center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-switch="#review-write">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span class="sr-only">Error:</span>
                                    <a href="#tab-sign-in" data-toggle="modal" data-tab="true" data-target="#sign-in-register-modal">Please Sign in to write a review</a>
                                </div>
                                <div class="review write switch" id="review-write">
                                    <aside class="name">John Doe</aside>
                                    <div class="comment">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="comment-title">
                                                    <h4>Review Your Stay</h4>
                                                </div>
                                                <!--end title-->
                                                <div class="form-group">
                                                    <label for="form_reply_1-name">Title of your review<em>*</em></label>
                                                    <input type="text" class="form-control" id="form_reply_1-name" name="name" placeholder="Beautiful holiday!" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form_reply_1-message">Your Answer<em>*</em></label>
                                                    <textarea class="form-control" id="form_reply_1-message" rows="8" name="answer" required="" placeholder="Describe your stay"></textarea>
                                                </div>
                                                <!--end form-group-->
                                                <div class="form-group pull-right">
                                                    <button type="submit" class="btn btn-primary btn-rounded">Send Review</button>
                                                </div>
                                                <!--end form-group-->
                                            </div>
                                            <!--end col-md-8-->
                                            <div class="col-md-4">
                                                <div class="comment-title">
                                                    <h4>Rating</h4>
                                                </div>
                                                <!--end title-->
                                                <dl class="visitor-rating">
                                                    <dt>Cleanliness</dt>
                                                    <dd class="star-rating active" data-name="cleanliness"></dd>
                                                    <dt>Comfort</dt>
                                                    <dd class="star-rating active" data-name="comfort"></dd>
                                                    <dt>Location</dt>
                                                    <dd class="star-rating active" data-name="location"></dd>
                                                    <dt>Facilities</dt>
                                                    <dd class="star-rating active" data-name="facilities"></dd>
                                                    <dt>Staff</dt>
                                                    <dd class="star-rating active" data-name="staff"></dd>
                                                    <dt>Value for money</dt>
                                                    <dd class="star-rating active" data-name="value"></dd>
                                                </dl>
                                            </div>
                                            <!--end col-md-4-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end comment-->
                                </div>
                                <!--end review-->
                            </form>
                            <!--end form-->
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
@endsection
