@extends('web.Blocks.layout')

@section('content')
    <div id="page-content">
        <div class="container">
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
                        <section>
                            <h2>Point Stort</h2>
                            <div class="row">
                                <table class="table">
                                    <caption>You Can Buy Now</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Point Count</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bypoints as $key => $bypoint)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$bypoint->FromUser->name}}</td>
                                            <td>Points {{$bypoint->point_count}}</td>
                                            <td>LKR {{$bypoint->amount}}</td>
                                            <td><button style="
                                                border: none;
                                                cursor: pointer;
                                                padding: 5px 8px;
                                                background: #218b15;
                                                color: white;
                                                border-radius: 4px;
                                            ">Buy Now</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
