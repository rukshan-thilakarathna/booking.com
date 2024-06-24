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
                <div class="col-md-3 col-sm-4">
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
                                        <input type="number" class="form-control" id="form-filter-check-out" name="check-out">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end form-group-inline-->
                                <div class="center">
                                    <a href="#filter-advanced-search" class="link icon" data-toggle="collapse" aria-expanded="false" aria-controls="filter-advanced-search">Advanced Search<i class="fa fa-plus"></i></a>
                                </div>
                                <div class="collapse" id="filter-advanced-search">
                                    <div class="wrapper">
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
                        <!--end filter-->
                        <div class="box">
                            <h2>Weather in Destination</h2>
                            <div id="weather" class="weather weather-detail"></div>
                            <!--end weather-->
                        </div>
                        <!--end box-->
                        <a href="#" class="advertising-banner">
                            <span class="banner-badge">Advertising</span>
                            <img src="assets/img/ad-banner-02.jpg" alt="">
                        </a>
                    </div>
                    <!--end sidebar-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-9 col-sm-8">
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
                                <h1>Mountain Paradise<span class="rating"><i class="fa fa-star"></i>9.9</span></h1>
                                <h3><a href="#">Austria</a> (63 properties)</h3>
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
                                    <div class="image">
                                        <a href="#reviews" class="review scroll">
                                            <div class="rating">
                                                <div class="rating-title">
                                                    <figure class="rating">9.8</figure>
                                                    <h4>Very Good Hotel</h4>
                                                </div>
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod. Suspendisse
                                                    at dui sit amet felis commodo dictum. Class aptent taciti sociosqu ad litora
                                                    torquent per conubia nostra, per inceptos
                                                </p>
                                            </div>
                                        </a>
                                        <img src="{{asset('web/assets/img/items/01_b.jpg')}}" alt="">
                                    </div>
                                    <div class="image">
                                        <a href="#reviews" class="review scroll">
                                            <div class="rating">
                                                <div class="rating-title">
                                                    <figure class="rating">9.9</figure>
                                                    <h4>Beautiful Holiday</h4>
                                                </div>
                                                <p>Class aptent taciti sociosqu ad litora
                                                    torquent per conubia nostra, per inceptos
                                                </p>
                                            </div>
                                        </a>
                                        <img src="{{asset('web/assets/img/items/02_b.jpg')}}" alt="">
                                    </div>
                                    <div class="image">
                                        <a href="#reviews" class="review scroll">
                                            <div class="rating">
                                                <div class="rating-title">
                                                    <figure class="rating">9.8</figure>
                                                    <h4>Very Good Hotel</h4>
                                                </div>
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod. Suspendisse
                                                    at dui sit amet felis commodo dictum. Class aptent taciti sociosqu ad litora
                                                    torquent per conubia nostra, per inceptos
                                                </p>
                                            </div>
                                        </a>
                                        <img src="{{asset('web/assets/img/items/03_b.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h2>Description</h2>
                        <div class="row">
                            <div class="col-md-8">
                                <section id="description">
                                    <h3>Spend Great Time in Our Hotel!</h3>
                                    <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod. Suspendisse
                                        at dui sit amet felis commodo dictum. Class aptent taciti sociosqu ad litora
                                        torquent per conubia nostra, per inceptos himenaeos. Integer commodo eleifend erat,
                                        vitae tincidunt urna volutpat et. Mauris laoreet, sem ut sodales sodales,
                                        massa turpis posuere lectus, non aliquet massa nisl ac orci.
                                    </p>
                                    <p>Aenean non dapibus neque. Praesent tempus aliquet felis, auctor aliquet ligula bibendum
                                        id. Phasellus ut finibus ligula. Suspendisse sodales lacus vel viverra egestas. Donec
                                        eu interdum sem, sed tempus odio. Interdum et malesuada fames ac ante ipsum primis in
                                        faucibus. In ut ante lacinia, interdum ante eu, posuere ex. Donec iaculis elit
                                        consectetur nisi finibus, a vestibulum nibh mattis. Aliquam erat volutpat.
                                    </p>
                                </section>
                                <section id="facilities">
                                    <h2>Facilities</h2>
                                    <ul class="bullets half">
                                        <li>Sauna</li>
                                        <li>Fireplace or fire pit</li>
                                        <li>Outdoor Kitchen</li>
                                        <li>Tennis Courts</li>
                                        <li>Trees and Landscaping</li>
                                        <li>Sun Room</li>
                                        <li>Family Room</li>
                                        <li>Concrete Flooring</li>
                                    </ul>
                                </section>
                                <section id="map">
                                    <h2>Map</h2>
                                    <div id="map-item" class="map height-300 box"></div>
                                    <!--end map-->
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
                                    <aside>
                                        <h2>Contact</h2>
                                        <address>
                                            <strong>Your Company</strong><br>
                                            4877 Spruce Drive<br>
                                            West Newton, PA 15089<br>
                                            <br>
                                            +1 (734) 123-4567<br>
                                            <a href="#">hello@example.com</a><br>
                                            <strong>skype:</strong> your.company
                                        </address>
                                    </aside>
                                </div>
                                <!--end sidebar-->
                            </div>
                            <!--end col-md-4-->
                        </div>
                        <!--end row-->
                        <section>
                            <h2>Why Choose This Hotel?</h2>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="feature">
                                        <aside class="circle">
                                            <i class="icon_box-checked"></i>
                                        </aside>
                                        <figure>
                                            <h3>200+ Reviews</h3>
                                        </figure>
                                    </div>
                                    <!--end feature-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="feature">
                                        <aside class="circle">
                                            <i class="icon_box-checked"></i>
                                        </aside>
                                        <figure>
                                            <h3>Low Prices</h3>
                                        </figure>
                                    </div>
                                    <!--end feature-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="feature">
                                        <aside class="circle">
                                            <i class="icon_box-checked"></i>
                                        </aside>
                                        <figure>
                                            <h3>Great Position</h3>
                                        </figure>
                                    </div>
                                    <!--end feature-->
                                </div>
                                <!--end col-md-4-->
                            </div>
                            <!--end row-->
                        </section>
                        <section id="availability">
                            <h2>Availability</h2>
                            <form class="labels-uppercase" id="form-availability">
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

                            <div class="form-reservations">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Room Type</th>
                                            <th>Persons</th>
                                            <th>Price</th>
                                            <th>Rooms</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <form id="room_1">
                                    <table class="table">
                                        <tbody>
                                        <tr class="room">
                                            <td class="room-type">
                                                <a href=""><h3>Double Room</h3><figure class="label label-danger">1 Room Left!</figure></a>
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod.
                                                    Suspendisse at dui sit amet felis commodo dictum.
                                                </p>
                                                <ul class="info">
                                                    <li>Breakfast Included</li>
                                                    <li>VAT Included</li>
                                                </ul>
                                            </td>
                                            <td class="persons">2<i class="fa fa-user"></i></td>
                                            <td class="price">$96</td>
                                            <td class="rooms">
                                                <select class="framed" name="room_1_nights">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-rounded">Reserve Now</button>
                                                </div>
                                                <!--end form-group-->
                                            </td>
                                        </tr>
                                        <!--end tr.room-->
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </form>
                                <!--edn form#room_1-->
                                <form id="room_2">
                                    <table class="table">
                                        <tbody>
                                        <tr class="room">
                                            <td class="room-type">
                                                <a href=""><h3>Family Suite</h3></a>
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod.
                                                    Suspendisse at dui sit amet felis commodo dictum.
                                                </p>
                                                <ul class="info">
                                                    <li>Breakfast Included</li>
                                                    <li>VAT Included</li>
                                                </ul>
                                            </td>
                                            <td class="persons">4+1<i class="fa fa-user"></i></td>
                                            <td class="price">$176</td>
                                            <td class="rooms">
                                                <select class="framed" name="room_2_nights">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-rounded">Reserve Now</button>
                                                </div>
                                                <!--end form-group-->
                                            </td>
                                        </tr>
                                        <!--end tr.room-->
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </form>
                                <!--edn form#room_2-->
                                <form id="room_3">
                                    <table class="table">
                                        <tbody>
                                        <tr class="room">
                                            <td class="room-type">
                                                <a href=""><h3>Apartment</h3></a>
                                                <p>Consectetur adipiscing elit. Vivamus nec augue ac dui sodales euismod.
                                                    Suspendisse at dui sit amet felis commodo dictum.
                                                </p>
                                                <ul class="info">
                                                    <li>Breakfast Included</li>
                                                    <li>VAT Included</li>
                                                </ul>
                                            </td>
                                            <td class="persons">2+2<i class="fa fa-user"></i></td>
                                            <td class="price">$250</td>
                                            <td class="rooms">
                                                <select class="framed" name="room_3_nights">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-rounded">Reserve Now</button>
                                                </div>
                                                <!--end form-group-->
                                            </td>
                                        </tr>
                                        <!--end tr.room-->
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </form>
                                <!--edn form#room_3-->
                            </div>
                            <!--end form-reservations-->
                        </section>
                        <section id="additional-information">
                            <h2>Additional Information</h2>
                            <dl class="info">
                                <dt>Check-in:</dt>
                                <dd>14:00 - 00:00</dd>
                                <dt>Check-out:</dt>
                                <dd><strong>Late Check-out: until 12:00 </strong></dd>
                                <dt>Cancellation:</dt>
                                <dd>Cancellation and prepayment policies vary according to room type.</dd>
                                <dt>Children:</dt>
                                <dd>All children are welcome.</dd>
                                <dt>Pets:</dt>
                                <dd>Pets are not allowed</dd>
                            </dl>
                            <!--end info-->
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
