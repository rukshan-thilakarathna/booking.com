<header style="background: white;position: fixed;width: 100%;z-index: 18;">
    <div class="d0">
        <div class="w">
            <div class="fsb" id="heder1">
                <div class="d1 fsb">
                    <a href="tel:+94112223334" class="a1">(+94) 11 222 3334</a>
                    <a href="mailto:Barterbed@slt.net" class="a1">Barterbed@slt.net</a>
                </div>
                <div class="d1 fsb">
                    <div class="d2">
                        <img class="i1" src="{{asset('web/img/icons/login-logout.svg')}}" alt="Login-Logout">
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
    <div class="w">
        <div class="fsb" id="heder2" >
            <a href="/" ><img class="i2" src="{{asset('web/img/icons/Logo.svg')}}" alt="Logo"></a>
            <nav id="topn" class="n">
                <a href="/" class="a2">Home</a>
                <a href="{{route('about-us')}}" class="a2">About Us</a>
                <a href="{{route('web.page.list')}}" class="a2">Property List</a>
                <a href="{{route('contact-us')}}" class="a2">Contact Us</a>
            </nav>
            <img id="menu" src="{{asset('web/img/icons/menu.png')}}" alt="Logo">
            <a class="bt1" href="{{route('web.dashboard')}}">List your property</a>

        </div>
    </div>
</header>
