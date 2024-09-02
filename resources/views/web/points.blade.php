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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('points')}}">Points</a></li>
            </ol>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="title">
                            <h1>Points</h1>
                        </div>
                        <!--end title-->
                        <section>
                            <h2>What is Ponts?</h2>
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
                        @if(isset(Session::get('user')['id']))
                            <section>
                                <h2>Point Stort</h2>
                                <div class="row">
                                    <table class="table">
                                        <caption>You Can Buy Now</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Number</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Point Count</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bypoints as $key => $bypoint)
                                            <tr>
                                                <form action="{{route('get-point')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$bypoint->id}}">
                                                    <th scope="row">{{$key+1}}</th>
                                                    <td>{{$bypoint->created_at}}</td>
                                                    <td>{{$bypoint->FromUser->name}}</td>
                                                    <td>Points {{$bypoint->point_count}}</td>
                                                    <td>LKR {{$bypoint->amount}}</td>
                                                    <td>LKR {{$bypoint->discount_amount}}</td>
                                                    <td><button type="submit" style="border: none;cursor: pointer;padding: 5px 8px;background: #218b15;color: white;border-radius: 4px;">Buy Now</button></td>
                                                </form>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end row-->
                            </section>
                        @endif

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
