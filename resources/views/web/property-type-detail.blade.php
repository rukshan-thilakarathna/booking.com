@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Listing</a></li>
                <li class="active">Detail</li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-content">
                        <div class="title">
                            <div class="left">
                                <h1>{{$roomType->name}}</h1>
                                <h3><a href="#">Austria</a></h3>
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
                                <section id="facilities">
                                    @php
                                        $room_facilities_array = explode(',', $roomType->room_facilities);
                                    @endphp
                                    <h2>Room Facilities</h2>
                                    <ul class="bullets half">
                                        @foreach($room_facilities_array as $key => $room_facility)
                                            <li>{{$room_facility}}</li>
                                        @endforeach
                                    </ul>
                                </section>

                                <section id="facilities">
                                    @php
                                        $bathroom_facilities_array = explode(',', $roomType->bathroom_facilities);
                                    @endphp
                                    <h2>Bathroom Facilities</h2>
                                    <ul class="bullets half">
                                        @foreach($bathroom_facilities_array as $key => $bathroom_facilities)
                                            @if($bathroom_facilities = '')
                                                <li>{{$bathroom_facilities}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </section>
                            </div>
                            <!--end col-md-8-->
                            <div class="col-md-4">
                                <div class="sidebar">
                                    <aside class="box">
                                        <dl>
                                            <dt>1-Bed Rooms:</dt>
                                            <dd>23</dd>
                                            <dt>2-Bed Rooms:</dt>
                                            <dd>48</dd>
                                            <dt>Apartments:</dt>
                                            <dd>12</dd>
                                            <dt>Parking:</dt>
                                            <dd>Free</dd>
                                            <dt>Swimming:</dt>
                                            <dd>Yes</dd>
                                            <dt>Ski Center:</dt>
                                            <dd>2km</dd>
                                        </dl>
                                    </aside>
                                </div>
                                <!--end sidebar-->
                            </div>
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
