@extends('web.Blocks.layout')

@section('content')
    <style>
        #_2:before{
            content: '';
            position: absolute;
            width: 120%;
            bottom: 0;
            height: 4px;
            left: 0;
            background: var(--cyan);
            z-index: 1;
            margin-left: -4px;
        }
    </style>

    <div id="page-content">
        <div style="width: 100%;height: 256px;background: url(http://localhost:8000/web/img/section-image/Find-Your-Ideal-Stay-in-Paradise.png);background-size: cover;background-position: 0;">

        </div>
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
                                <li><a  href="{{route('web.page.list')}}" >Property List</a></li>
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
