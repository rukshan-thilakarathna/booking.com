@extends('web.Blocks.layout')

@section('links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('web/assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/assets/fonts/elegant-fonts.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/zabuto_calendar.min.css')}}" type="text/css">
@endsection
 
@section('style')
    <style>
        #_3:before{content: '';position: absolute;width: 120%;bottom: 0;height: 4px;left: 0;background: var(--cyan);z-index: 1;margin-left: -4px;}
    </style>
@endsection

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
                                </div>

                                <div class="form-group-inline">
                                        <div class="form-group">
                                            <label for="form-filter-check-in">Min Price</label>
                                            <input type="number" class="form-control" id="form-filter-check-out" value="{{$minPrice}}" name="min" placeholder="Min">
                                        </div>
                                        <!--end form-group-->
                                        <div class="form-group">
                                            <label for="form-filter-check-out">Max Price</label>
                                            <input type="number" class="form-control" id="form-filter-check-out" value="{{$maxPrice}}" name="max" placeholder="Max">
                                        </div>
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
                                                    $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
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
                                       <img id="id_{{$item->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $item->id) }}"  data-id="{{$item->id}}" src="{{in_array($item->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                    </div>
                                    <!--end meta-->
                                    <div class="info">
                                        <a href="{{route('web.page.detail',$item->id)}}"><h3 style="font-size: 20px">{{$item->name}}</h3></a>
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
