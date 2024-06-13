<header>
    <div class="d0">
        <div class="w">
            <div class="fsb">
                <div class="d1 fsb">
                    <a href="tel:+94112223334" class="a1">(+94) 11 222 3334</a>
                    <a href="mailto:Barterbed@slt.net" class="a1">Barterbed@slt.net</a>
                </div>
                <div class="d1 fsb">
                    <select class="sl1">
                        <option value="LKR">LKR</option>
                        <option value="USD">USD</option>
                    </select>

                    <select class="sl1">
                        <option value="ENG">ENG</option>
                    </select>

                    <div class="d2">
                        <img class="i1" src="{{asset('web/img/icons/login-logout.svg')}}" alt="Login-Logout">
                        @if(isset(Session::get('user')['id']))
                            <a class="a1" href="{{route('web.dashboard')}}">{{Session::get('user')['name']}} </a>
                        @else
                            <a class="a1" href="{{route('web.login')}}">Sign in  |  Sign Up</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w">
        <div class="fsb">
            <img class="i2" src="{{asset('web/img/icons/Logo.svg')}}" alt="Logo">
            <nav class="n">
                <a href="#" class="a2">About Us</a>
                <a href="#" class="a2">Destinations</a>
                <a href="#" class="a2">Accommodations</a>
                <a href="#" class="a2">Contact Us</a>
            </nav>
            <button class="bt1">List your property</button>
        </div>
    </div>
</header>
