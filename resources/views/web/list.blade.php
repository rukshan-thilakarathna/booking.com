@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Listing</li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="box filter">
                            <h2>Search</h2>
                            <form id="form-filter" class="labels-uppercase">
                                <div class="form-group-inline" style="display: flex;flex-direction: column">
                                    <div class="form-group" style="padding: 0;">
                                        <label for="form-filter-check-in">Check In</label>
                                        <input type="date" class="form-control" id="form-filter-check-in" value="{{$checkIn}}" name="checkIn" placeholder="Check In">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-filter-check-in">Check Out</label>
                                        <input type="date" class="form-control" id="form-filter-check-in" value="{{$checkOut}}" name="checkOut" placeholder="Check In">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end form-group-inline-->
                                <div class="center">
                                    <a href="#filter-advanced-search" class="link icon" data-toggle="collapse" aria-expanded="false" aria-controls="filter-advanced-search">Advanced Search<i class="fa fa-plus"></i></a>
                                </div>
                                <div class="collapse in" id="filter-advanced-search">
                                    <div class="wrapper">
                                        <h2>Filter<span data-show-after-time="1000" data-container="body" data-toggle="popover" data-placement="right" ></span></h2>

                                        <section>
                                            <h3>Destination </h3>
                                            <ul class="checkboxes">
                                                @foreach($destinationList as $destination)
                                                    <li><label><input @if(in_array($destination->id,$UrlDestinationList)) checked @endif type="checkbox" name="destination[]" value="{{$destination->id}}">{{$destination->name_en}}</label></li>
                                                @endforeach
                                            </ul>
                                        </section>

                                        <section>
                                            <h3>Property Type </h3>
                                            <ul class="checkboxes">
                                                @foreach($propertyTypes as $propertyType)
                                                    <li><label><input @if(in_array($propertyType->id,$UrlPropertyType)) checked @endif type="checkbox" name="pt[]" value="{{$propertyType->id}}">{{$propertyType->name}}</label></li>
                                                @endforeach
                                            </ul>
                                        </section>
                                        <!--end section-->
                                        <section>
                                            <h3>Property Facility</h3>
                                            <ul class="checkboxes no-bottom-margin">
                                                @foreach(config('constants.PropertyFacility') as $key => $PropertyFacility)
                                                    <li><label><input @if(in_array($key,$UrlPropertyFacility)) checked @endif type="checkbox" name="PropertyFacility[]" value="{{$key}}">{{$PropertyFacility}}</label></li>
                                                @endforeach
                                            </ul>
                                            <!--end checkboxes-->
                                        </section>
                                        <!--end section-->
                                    </div>
                                    <!--end filter-advanced-search-->
                                </div>
                                <!--end collapse-->
                                <div class="form-group center">
                                    <button type="submit" class="btn btn-primary btn-rounded form-control">Search</button>
                                    <a href="{{route('web.page.list')}}"  class="btn btn-primary btn-rounded form-control">Reset</a>
                                </div>
                            </form>
                            <!--end form-filter-->
                        </div>
                    </div>
                    <!--end sidebar-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-9">
                    <div class="main-content">

                        @foreach($list as $item)
                            <div class="item list" data-map-latitude="48.87" data-map-longitude="2.29" data-id="1">
                                <div class="image-wrapper">
                                    <div class="image">
                                        <a href="{{route('web.page.detail',$item->id)}}" class="wrapper">

                                            <div class="gallery">
                                                @php
                                                    $image_array = explode(',', $item->image);
                                                @endphp
                                                <img {{count($image_array)}} src="{{asset('Property/Images/'.$image_array[0])}}" alt="">

                                                @foreach($image_array as $key => $image)
                                                    @if($key>0)
                                                        <img src="#" class="owl-lazy" alt="" data-src="{{asset('Property/Images/'.$image)}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </a>
                                        <div class="map-item">
                                            <button class="btn btn-close"><i class="fa fa-close"></i></button>
                                            <div class="map-wrapper"></div>
                                        </div>
                                        <!--end map-item-->
                                        <div class="owl-navigation"></div>
                                        <!--end owl-navigation-->
                                    </div>
                                </div>
                                <!--end image-->
                                <div class="description">
                                    <div class="meta">
                                        <span><i class="fa fa-star"></i>8.9</span>
                                    </div>
                                    <!--end meta-->
                                    <div class="info">
                                        <a href="{{route('web.page.detail',$item->id)}}"><h3>{{$item->name}}</h3></a>
                                        <figure class="location">{{$item->district->name_en}}</figure>
                                        <figure class="label label-info">{{$item->propertyType->name}}</figure>
                                        <p>{{$item->description}}</p>
                                        <a href="{{route('web.page.detail',$item->id)}}" class="btn btn-rounded btn-default btn-framed btn-small">View detail</a>
                                    </div>
                                    <!--end info-->
                                </div>
                                <!--end description-->
                            </div>
                        @endforeach

                        <div class="center">
                        </div>
                        <!-- end center-->
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
