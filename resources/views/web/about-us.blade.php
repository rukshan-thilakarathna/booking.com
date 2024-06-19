@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('about-us')}}">About Us</a></li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="box filter">
                            <h2>About Us</h2>
                            <ul class="links">
                                <li class="active"><a href="{{route('about-us')}}">About Us</a></li>
                                <li><a href="become-an-affiliate.html">Destinations</a></li>
                                <li><a href="terms-and-conditions.html">Accommodations</a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!--end filter-->
                    </div>
                    <!--end sidebar-->
                </div>
                <!--end col-md-3-->
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="title">
                            <h1>About Us</h1>
                        </div>
                        <!--end title-->
                        <section>
                            <h2>What is Accommodo?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel magna vulputate magna
                                semper laoreet ac eu sapien. Donec blandit nulla eu lacus convallis faucibus. Etiam ut efficitur
                                velit, dictum volutpat ante. Integer hendrerit turpis porta neque efficitur, sed efficitur libero
                                lobortis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse non ex id
                                sapien venenatis mattis. Nam facilisis molestie pulvinar. Morbi tincidunt, eros sit amet imperdiet
                                finibus, velit sapien rutrum enim, consectetur dictum diam massa eu nibh. Sed aliquam ut orci eget
                                dictum. Sed consectetur sem sit amet metus tempor condimentum. In nec semper ante, mattis placerat lacus.
                            </p>
                            <p>
                                Sed eu dui nisl. Suspendisse at massa dictum odio lacinia semper ut eu odio. Etiam viverra,
                                nunc at sagittis convallis, tortor dolor volutpat purus, a mollis nunc arcu eget nulla. Mauris
                                gravida nibh nec suscipit rutrum. Vestibulum commodo lacus vulputate, ultrices ligula at,
                                posuere augue. Proin fermentum mattis sem vel ultrices. Donec porta turpis non hendrerit porttitor.
                            </p>
                        </section>
                        <section>
                            <h2>Our Team</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="member">
                                        <div class="image"><img src="assets/img/person-01.jpg" alt=""></div>
                                        <div class="description">
                                            <h3>Kate Brown</h3>
                                            <h4>Company CEO</h4>
                                            <div class="info">
                                                <dl>
                                                    <dt>Phone:</dt>
                                                    <dd>(123) 456 789</dd>
                                                    <dt>Mobile Phone:</dt>
                                                    <dd>888 123 456 789</dd>
                                                    <dt>Email:</dt>
                                                    <dd><a href="mailto:kate.brown@example.com">kate.brown@example.com</a></dd>
                                                    <dt>Skype:</dt>
                                                    <dd>kate.brown</dd>
                                                </dl>
                                            </div>
                                            <!--end info-->
                                        </div>
                                        <!--end description-->
                                    </div>
                                    <!--member-->
                                </div>
                                <!--col-md-6-->
                                <div class="col-md-6">
                                    <div class="member">
                                        <div class="image"><img src="assets/img/person-02.jpg" alt=""></div>
                                        <div class="description">
                                            <h3>Jone Doe</h3>
                                            <h4>PR Manager</h4>
                                            <div class="info">
                                                <dl>
                                                    <dt>Phone:</dt>
                                                    <dd>(123) 456 789</dd>
                                                    <dt>Mobile Phone:</dt>
                                                    <dd>888 123 456 789</dd>
                                                    <dt>Email:</dt>
                                                    <dd><a href="mailto:kate.brown@example.com">kate.brown@example.com</a></dd>
                                                    <dt>Skype:</dt>
                                                    <dd>kate.brown</dd>
                                                </dl>
                                            </div>
                                            <!--end info-->
                                        </div>
                                        <!--end description-->
                                    </div>
                                    <!--member-->
                                </div>
                                <!--col-md-6-->
                                <div class="col-md-6">
                                    <div class="member">
                                        <div class="image"><img src="assets/img/person-03.jpg" alt=""></div>
                                        <div class="description">
                                            <h3>Kate Brown</h3>
                                            <h4>Marketing Guru</h4>
                                            <div class="info">
                                                <dl>
                                                    <dt>Phone:</dt>
                                                    <dd>(123) 456 789</dd>
                                                    <dt>Mobile Phone:</dt>
                                                    <dd>888 123 456 789</dd>
                                                    <dt>Email:</dt>
                                                    <dd><a href="mailto:kate.brown@example.com">kate.brown@example.com</a></dd>
                                                    <dt>Skype:</dt>
                                                    <dd>kate.brown</dd>
                                                </dl>
                                            </div>
                                            <!--end info-->
                                        </div>
                                        <!--end description-->
                                    </div>
                                    <!--member-->
                                </div>
                                <!--col-md-6-->
                                <div class="col-md-6">
                                    <div class="member">
                                        <div class="image"><img src="assets/img/person-04.jpg" alt=""></div>
                                        <div class="description">
                                            <h3>John Doe</h3>
                                            <h4>Support Ninja</h4>
                                            <div class="info">
                                                <dl>
                                                    <dt>Phone:</dt>
                                                    <dd>(123) 456 789</dd>
                                                    <dt>Mobile Phone:</dt>
                                                    <dd>888 123 456 789</dd>
                                                    <dt>Email:</dt>
                                                    <dd><a href="mailto:kate.brown@example.com">kate.brown@example.com</a></dd>
                                                    <dt>Skype:</dt>
                                                    <dd>kate.brown</dd>
                                                </dl>
                                            </div>
                                            <!--end info-->
                                        </div>
                                        <!--end description-->
                                    </div>
                                    <!--member-->
                                </div>
                                <!--col-md-6-->
                            </div>
                            <!--end row-->
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
@endsection
