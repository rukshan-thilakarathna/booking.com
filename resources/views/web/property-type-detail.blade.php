@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

@section('links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('web/assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/assets/fonts/elegant-fonts.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/zabuto_calendar.min.css')}}" type="text/css">
@endsection

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('web.page.list')}}">Listing</a></li>
                <li><a href="{{route('web.page.detail',$roomType->property->id)}}">{{$roomType->property->name}}</a></li>
                <li class="active">Property Type Detail</li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-content">
                        <div class="title">
                            <div class="left">
                                <h1>{{$roomType->name}}</h1>
                            </div>
                        </div>
                        <!--end title-->
                        <section id="gallery">
                            <div class="gallery-detail">
                                <div class="one-item-carousel">
                                    @php
                                        $image_array = explode(',', $roomType->images);
                                    @endphp
                                    @foreach($image_array as $key => $images)
                                        @if($images != "")
                                            <div class="image">
                                                <img src="{{asset('Property/RoomType/'.$images)}}" alt="">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <h2>Description</h2>
                        <div class="row">
                            <div class="col-md-8">
                                <section id="description">
                                    <p>{{$roomType->disription}}</p>
                                </section>
                                @if(!empty($roomType->room_facilities))
                                    <section id="facilities">
                                        @php
                                            $room_facilities_array = explode(',', $roomType->room_facilities);
                                        @endphp
                                        <h2>Room Facilities</h2>
                                        <ul class="bullets half">
                                            @foreach($room_facilities_array as $room_facility)
                                                <li>{{config('constants.RoomFacilities')[trim($room_facility," ")]}}</li>
                                            @endforeach
                                        </ul>
                                    </section>
                                @endif @if(!empty($roomType->bathroom_facilities))
                                <section id="facilities">
                                    @php
                                        $bathroom_facilities_array = explode(',', $roomType->bathroom_facilities);
                                    @endphp
                                    <h2>Bathroom Facilities</h2>
                                    <ul class="bullets half">
                                        @foreach($bathroom_facilities_array as $key => $bathroom_facilities)
                                            <li>{{config('constants.BathroomFacilities')[trim($bathroom_facilities," ")]}}</li>
                                        @endforeach
                                    </ul>
                                </section>
                                @endif @if(!empty($roomType->view_facilities))
                                <section id="facilities">
                                    @php
                                        $view_facilities_array = explode(',', $roomType->view_facilities);
                                    @endphp
                                    <h2>View Facilities</h2>
                                    <ul class="bullets half">
                                        @foreach($view_facilities_array as $key => $view_facilities)
                                            <li>{{config('constants.ViewFacilities')[trim($view_facilities," ")]}}</li>
                                        @endforeach
                                    </ul>
                                </section>
                                @endif @if(!empty($roomType->kitchen_facilities))
                                <section id="facilities">
                                    @php
                                        $kitchen_facilities_array = explode(',', $roomType->kitchen_facilities);
                                    @endphp
                                    <h2>Kitchen Facilities</h2>
                                    <ul class="bullets half">
                                        @foreach($kitchen_facilities_array as $key => $kitchen_facilities)
                                            <li>{{config('constants.KitchenFacilities')[trim($kitchen_facilities," ")]}}</li>
                                        @endforeach
                                    </ul>
                                </section>
                                @endif
                            </div>
                            <!--end col-md-8-->
                            <!--end col-md-4-->
                        </div>
                        <!--end row-->

                    </div>
                    <!--end main-content-->
                </div>
                <!--end col-md-9-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
@endsection

@section('js')
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
@endsection
