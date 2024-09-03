<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('web/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css">

    @yield('links')

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    @yield('style')
</head>
<body>

@include('web/Blocks/nav')


@yield('content')


<footer id="ft">
    <div class="w fsb" id="footer1"   >
     
        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="{{route('web.page.index')}}" class="a100">Home</a></li>
                <li class="l100"><a href="{{route('about-us')}}" class="a100">About Us</a></li>
                <li class="l100"><a href="{{route('web.page.list')}}" class="a100">Property List</a></li>
                <li class="l100"><a href="{{route('contact-us')}}" class="a100">Contact Us</a></li>
                <li class="l100"><a href="{{route('user.registration','property-owner')}}" class="a100">Property Owner Registration</a></li>
                <li class="l100"><a href="{{route('user.registration','worker')}}" class="a100">Worker Registration</a></li>
            </ul>
        </div>

        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="{{route('web.page.index')}}" class="a100">Home</a></li>
                <li class="l100"><a href="{{route('about-us')}}" class="a100">About Us</a></li>
                <li class="l100"><a href="{{route('web.page.list')}}" class="a100">Property List</a></li>
                <li class="l100"><a href="{{route('contact-us')}}" class="a100">Contact Us</a></li>
                <li class="l100"><a href="{{route('user.registration','property-owner')}}" class="a100">Property Owner Registration</a></li>
                <li class="l100"><a href="{{route('user.registration','worker')}}" class="a100">Worker Registration</a></li>
            </ul>
        </div>

        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="{{route('web.page.index')}}" class="a100">Home</a></li>
                <li class="l100"><a href="{{route('about-us')}}" class="a100">About Us</a></li>
                <li class="l100"><a href="{{route('web.page.list')}}" class="a100">Property List</a></li>
                <li class="l100"><a href="{{route('contact-us')}}" class="a100">Contact Us</a></li>
                <li class="l100"><a href="{{route('user.registration','property-owner')}}" class="a100">Property Owner Registration</a></li>
                <li class="l100"><a href="{{route('user.registration','worker')}}" class="a100">Worker Registration</a></li>
            </ul>
        </div>

        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="{{route('web.page.index')}}" class="a100">Home</a></li>
                <li class="l100"><a href="{{route('about-us')}}" class="a100">About Us</a></li>
                <li class="l100"><a href="{{route('web.page.list')}}" class="a100">Property List</a></li>
                <li class="l100"><a href="{{route('contact-us')}}" class="a100">Contact Us</a></li>
                <li class="l100"><a href="{{route('user.registration','property-owner')}}" class="a100">Property Owner Registration</a></li>
                <li class="l100"><a href="{{route('user.registration','worker')}}" class="a100">Worker Registration</a></li>
            </ul>
        </div>

        <div class="d101">
            <span class="s100">Contacts</span>
            <ul class="u100">
                <li class="l100"><a href="" class="a100">barterbed@slt.net</a></li>
                <li class="l100"><a href="" class="a100">(+94) 11 222 3334</a></li>
                <li class="l100"><a href="" class="a100">(+94) 11 222 5555</a></li>
                <li class="l100">
                    <a href="" class="a100"><img src="{{asset('web/img/icons/Vector.png')}}" alt="" class="i200"></a>
                    <a href="" class="a100"><img src="{{asset('web/img/icons/Mask group.svg')}}" alt="" class="i200"></a>
                    <a href="" class="a100"><img src="{{asset('web/img/icons/Mask group (1).svg')}}" alt="" class="i200"></a>
                    <a href="" class="a100"><img src="{{asset('web/img/icons/Mask group (2).svg')}}" alt="" class="i200"></a>
                </li>
            </ul>
        </div>
    </div>
    <span class="s101">Copyright © 2024 Barterbed | Design by SATASME</span>
</footer>










<script>
    var _ = e => document.getElementById(e);
    window.addEventListener("click",(e) => {
        switch(e.target.id){
            case 'menu' :
                if(_('topn').style.display == 'flex'){
                    _('topn').style.display = 'none'
                }else{
                    _('topn').style.display = 'flex'
                }
                break;
        }
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('.zbt1').trigger('focus')
      })
</script>

@yield('js')
</body>
</html>

