<header style="background: white;position: fixed;width: 100%;z-index: 18;">
    <div class="d0">
        <div class="w">
            <div class="fsb" id="heder1">
                <a href="/" ><img class="i2" src="{{asset('web/img/icons/Logo.svg')}}" alt="Logo"></a>
                <div style="display: flex;">
                   
                    <div class="d1 fsb">
                        @if(isset(Session::get('user')['id']))
                            <a href="{{route('web.page.list')}}" class="a1">List your property</a>
                            <a href="" class="a1">Bookings</a>
                        @else
                            <a href="{{route('web.login')}}" class="a1">List your property</a>
                            <a href="{{route('web.login')}}" class="a1">Bookings</a>
                        @endif

                        <a href="" class="a1">Support</a>
                        <div class="d2">
                           
                            @if(isset(Session::get('user')['id']))
                                <a class="a1" href="{{route('web.dashboard')}}">{{Session::get('user')['name']}} <span style=" font-size: 12px;" >({{Session::get('user')['role']}})</span></a>
                                <a class="a1" href="{{route('logout')}}">Sign out</a>
                            @else
                                <a class="a1" href="{{route('web.login')}}">Sign in  |  Sign Up</a>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="w">
        <div class="fsb" id="heder2" >
            <a href="/" ><img class="i2" src="{{asset('web/img/icons/Logo.svg')}}" alt="Logo"></a>
            <nav id="topn" class="n">
                <a id="_1" href="/" class="a2">Home</a>
                <a id="_2" href="{{route('about-us')}}" class="a2">About Us</a>
                <a id="_3" href="{{route('web.page.list')}}" class="a2">Property List</a>
                <a id="_4" href="{{route('contact-us')}}" class="a2">Contact Us</a>
            </nav>
            <img id="menu" src="{{asset('web/img/icons/menu.png')}}" alt="Logo">
            @if(isset(Session::get('user')['role']) && Session::get('user')['role'] == 'property-owner')
                <a style="    color: #686565;" class="bt1" href="{{route('post-property')}}">List your property</a>
            @else
                <a style="    color: #686565;" class="bt1" href="{{route('web.page.list')}}">Book Now property</a>
            @endif


        </div>
    </div> -->
</header>
