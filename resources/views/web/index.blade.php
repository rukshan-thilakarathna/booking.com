@extends('web.Blocks.layout')

@section('content')

{{--{{dd(Session::get('user'))}}--}}

    <section id="zse1">
        <div class="zd1">
            <h1 class="zh1">Find Your Ideal Stay in <br> Paradise</h1>
            <p>Discover the Perfect Accommodation for Your Dream Vacation</p>
            <div class="zd2">
                <div class="zd3">
                    <input type="text" class="zin1" placeholder="Where are you going?">
                    <input type="date" class="zin1" placeholder="Check in">
                    <input type="date" class="zin1" placeholder="Check Out">
                    <input type="number" class="zin1" placeholder="Guest">
                </div>
                <button class="bt1">Search</button>
            </div>
        </div>
    </section>



    <section id="z2se2">
        <div class="w">
            <h1 class="z2h1">Top Destinations</h1>
            <div class="z2d1">
                <div class="z2d2 z2d1-1"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Sigiriya.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Sigiriya</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
                <div class="z2d2 z2d1-2"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Galle.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Galle</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
                <div class="z2d2 z2d1-3"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Colombo.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Colombo</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
            </div>

            <div class="z2d1" id="z2d3">
                <div class="z2d2 z2d1-1"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Anuradhapura.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Anuradhapura</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
                <div class="z2d2 z2d1-2"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Kandy.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Kandy</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
                <div class="z2d2 z2d1-3"
                     style="background: url({{asset('web/img/Top-Destinations-section-images/Mathara.png')}});background-size: cover;background-position: center;">
                    <div class="z2d4">
                        <h2 class="z2h2">Mathara</h2>
                        <span class="z2s1">40 Hotels <span class="z2s2">40 Villas</span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="z3se1">
        <div class="w">
            <h1 class="z3h1">Find Your Perfect Accommodation</h1>
            <div class="fsb">
                <div class="z3d1">
                    <img class="z3i1" src="{{asset('web/img/Find-Your-Perfect-Accommodation/Hotels.png')}}"
                         alt="Find-Your-Perfect-Accommodation-Hotels">
                    <h2 class="z3h2">Hotels</h2>
                </div>

                <div class="z3d1">
                    <img class="z3i1" src="{{asset('web/img/Find-Your-Perfect-Accommodation/Villas.png')}}"
                         alt="Find-Your-Perfect-Accommodation-Villas">
                    <h2 class="z3h2">Villas</h2>
                </div>

                <div class="z3d1">
                    <img class="z3i1" src="{{asset('web/img/Find-Your-Perfect-Accommodation/Guest-Houses.png')}}"
                         alt="Find-Your-Perfect-Accommodation-Guest Houses">
                    <h2 class="z3h2">Guest Houses</h2>
                </div>

                <div class="z3d1">
                    <img class="z3i1" src="{{asset('web/img/Find-Your-Perfect-Accommodation/holiday bungalow .png')}}"
                         alt="Find-Your-Perfect-Accommodation-holiday bungalow ">
                    <h2 class="z3h2">Holiday Bungalow </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="z4se1">
        <div class="w">
            <div class="z4d1">
                <hgroup id="z4hg1">
                    <p id="z4p1">Unlock More Value with Every Booking!</p>
                    <h1 id="z4h1">Earn and Spend Points on Your Next Getaway!</h1>
                </hgroup>
                <a href="#" class="z4a1">Join the Points Revolution!</a>
            </div>
        </div>
    </section>

    <section id="z5se1">
        <div class="w">
            <h1 class="z5h1">Why Choose Barterbed</h1>
            <div class="z5d1">
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Extensive-Selection.svg')}}" alt="Extensive Selection"
                         class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Secure-and-Convenient-Booking.svg')}}"
                         alt="Secure and Convenient Booking" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Personalized-Recommendations.svg')}}"
                         alt="Personalized Recommendations" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="z6se1">
        <div class="w">
            <h1 class="z5h1">Discover the Latest Hits</h1>
            <div class="z6d1">
                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Discover-the-Latest-Hits/2.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>

                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Discover-the-Latest-Hits/1.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>

                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Discover-the-Latest-Hits/3.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="z7se1">
        <div class="z7d1" id="z7d3">
            <div class="z7d4">
                <h1 class="z7h1">Honeymoon Haven</h1>
                <p class="z7p1">Romantic Escapes at Unbeatable Prices!</p>
                <a href="" class="z7a1">Book Now</a>
            </div>
        </div>
        <div class="z7d1" id="z7d2">
            <div class="z7d4">
                <h1 class="z7h1">Honeymoon Haven</h1>
                <p class="z7p1">Romantic Escapes at Unbeatable Prices!</p>
                <a href="" class="z7a1">Book Now</a>
            </div>
        </div>
    </section>

    <section id="z8se1">
        <div class="w">
            <h1 class="z5h1">Explore Our Top-rated Stays</h1>
            <div class="z8d1">
                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Explore-Our-Top-rated-Stays/2.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>

                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Explore-Our-Top-rated-Stays/3.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>

                <div class="x1d1">
                    <div class="x1d2"
                         style="background: url({{asset('web/img/Explore-Our-Top-rated-Stays/1.png')}});  background-size: cover;">
                        <div class="x1d3">
                            <span class="x1s1">15%</span>
                            <img src="{{asset('web/img/icons/Vector.svg')}}" alt="hart" class="x1i1">
                        </div>
                        <div class="x1d4">
                            <span class="xis2">From $400  <br><span class="xis3">20 Points </span></span>
                            <img src="{{asset('web/img/icons/start.png')}}" alt="hart" class="x1i2">
                        </div>
                    </div>
                    <div class="xid5">
                        <h2 class="x1h2">Double Suite Rooms</h2>
                        <span class="x1s4">Ella, Sri Lanka</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
