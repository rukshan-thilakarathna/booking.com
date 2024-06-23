@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="#">Listing</a></li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="box filter">
                            <h2>Search</h2>
                            <form id="form-filter" class="labels-uppercase">
                                <div class="form-group">
                                    <label for="form-filter-destination">Destination</label>
                                    <input type="text" class="form-control" id="form-filter-destination" name="destination" placeholder="Destination">
                                </div>
                                <!--end form-group-->
                                <div class="form-group-inline">
                                    <div class="form-group">
                                        <label for="form-filter-check-in">Check In</label>
                                        <input type="text" class="form-control date" id="form-filter-check-in" name="check-in" placeholder="Check In">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-filter-check-out">Nights</label>
                                        <input type="number" class="form-control" id="form-filter-check-out" name="check-out" placeholder="2">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end form-group-inline-->
                                <div class="center">
                                    <a href="#filter-advanced-search" class="link icon" data-toggle="collapse" aria-expanded="false" aria-controls="filter-advanced-search">Advanced Search<i class="fa fa-plus"></i></a>
                                </div>
                                <div class="collapse in" id="filter-advanced-search">
                                    <div class="wrapper">
                                        <h2>Filter<span data-show-after-time="1000" data-container="body" data-toggle="popover" data-placement="right" title="Try Filters!" data-content="Get better results by using filters. Check what you like and what you don't."></span></h2>
                                        <section>
                                            <h3>Rate (per night)</h3>
                                            <ul class="checkboxes list-unstyled">
                                                <li><label><input type="checkbox" name="hotel">$0 - $50<span>12</span></label></li>
                                                <li><label><input type="checkbox" name="apartment">$50 - $100<span>48</span></label></li>
                                                <li><label><input type="checkbox" name="breakfast-only">$150 - $150<span>36</span></label></li>
                                                <li><label><input type="checkbox" name="spa-wellness">$150+<span>56</span></label></li>
                                            </ul>
                                            <!--end checkboxes-->
                                        </section>
                                        <!--end section-->
                                        <section>
                                            <h3>Property Type </h3>
                                            <ul class="checkboxes">
                                                <li><label><input type="checkbox" name="hotel">Apartmets<span>67</span></label></li>
                                                <li><label><input type="checkbox" name="apartment">Hotels<span>31</span></label></li>
                                                <li><label><input type="checkbox" name="breakfast-only">Boats<span>68</span></label></li>
                                                <li><label><input type="checkbox" name="spa-wellness">Villas<span>52</span></label></li>
                                            </ul>
                                            <div class="collapse" id="all-property-types">
                                                <ul class="checkboxes">
                                                    <li><label><input type="checkbox" name="ski-center">Ski Center<span>67</span></label></li>
                                                    <li><label><input type="checkbox" name="cottage">Cottage<span>31</span></label></li>
                                                    <li><label><input type="checkbox" name="hostel">Hostel<span>68</span></label></li>
                                                    <li><label><input type="checkbox" name="boat">Boat<span>52</span></label></li>
                                                </ul>
                                            </div>
                                            <!--end checkboxes-->
                                            <a href="#all-property-types" class="link" data-toggle="collapse" aria-expanded="false" aria-controls="all-property-types">Show all</a>
                                        </section>
                                        <!--end section-->
                                        <section>
                                            <h3>Property Facility</h3>
                                            <ul class="checkboxes no-bottom-margin">
                                                <li><label><input type="checkbox" name="wi-fi">Wi-fi<span>12</span></label></li>
                                                <li><label><input type="checkbox" name="free-parking">Free Parking<span>48</span></label></li>
                                                <li><label><input type="checkbox" name="airport">Airport Shuttle<span>36</span></label></li>
                                                <li><label><input type="checkbox" name="family-rooms">Family Rooms<span>56</span></label></li>
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
                        <!--end title-->
                        <div class="item list" data-map-latitude="48.87" data-map-longitude="2.29" data-id="1">
                            <div class="image-wrapper">
                                <div class="mark-circle description" data-toggle="tooltip" data-placement="right" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis erat vel quam aliquet hendrerit semper eget elit. Aenean tincidunt ultrices bibendum. Proin nisi erat, iaculis non pulvinar a, scelerisque ut est. "><i class="fa fa-question"></i></div>
                                <div class="mark-circle map" data-toggle="tooltip" data-placement="right" title="Show on map"><i class="fa fa-map-marker"></i></div>
                                <div class="mark-circle top" data-toggle="tooltip" data-placement="right" title="Top accommodation"><i class="fa fa-thumbs-up"></i></div>
                                <div class="image">
                                    <a href="detail.html" class="wrapper">
                                        <div class="gallery">
                                            <img src="assets/img/items/01.jpg" alt="">
                                            <img src="#" class="owl-lazy" alt="" data-src="assets/img/items/02.jpg">
                                            <img src="#" class="owl-lazy" alt="" data-src="assets/img/items/03.jpg">
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
                                    <span><i class="fa fa-bed"></i>365</span>
                                </div>
                                <!--end meta-->
                                <div class="info">
                                    <a href="detail.html"><h3>Spring Hotel</h3></a>
                                    <figure class="location">Montenegro</figure>
                                    <figure class="label label-info">Hotel</figure>
                                    <figure class="live-info">3 Persons watching now!</figure>
                                    <p>
                                        Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod. Suspendisse
                                        at dui sit amet felis commodo dictum. Class aptent taciti sociosqu ad
                                        litora torquent per conubia nostra,
                                    </p>
                                    <div class="price-info">From<span class="price">$32</span><span class="appendix">/night</span></div>
                                    <a href="detail.html" class="btn btn-rounded btn-default btn-framed btn-small">View detail</a>
                                </div>
                                <!--end info-->
                            </div>
                            <!--end description-->
                        </div>
                        <!--end item-->
                        <div class="center">
                            <ul class="pagination">
                                <li class="prev">
                                    <a href="#"><i class="arrow_left"></i></a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li class="next">
                                    <a href="#"><i class="arrow_right"></i></a>
                                </li>
                            </ul>
                            <!-- end pagination-->
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
