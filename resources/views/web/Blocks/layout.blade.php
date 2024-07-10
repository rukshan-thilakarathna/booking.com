<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('web/css/css.css')}}">

    {{--    temp--}}
    <link href="{{asset('web/assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/assets/fonts/elegant-fonts.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/zabuto_calendar.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web/assets/slider/slider.css?fd')}}" type="text/css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Document</title>
<style>
    #zse1 {background: url({{asset('web/img/section-image/Find-Your-Ideal-Stay-in-Paradise.png')}});height: 100vh;background-size: cover;position: relative;}
    .zd1 {position: absolute;width: 50%;display: flex;flex-direction: column;text-align: center;margin: auto;top: 33%;right: 0;left: 0;}
    .zh1 {color: white;font-size: 60px;font-weight:bold;font-family: "Cormorant Garamond", serif;}

    #zse1::before {content: "";display: block;width: 100%;height: 100%;background: #00000073;}
    .zd2 {
        padding: 3px 15px;
        background: white;
        border-radius: 72px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }
    .zd3 {
        background: white;
        border-radius: 37px;
        display: flex;
        width: 85%;
    }
    .zin1 {color: #767676;
        border: none;
        outline: none;
        border-right: 1px solid #D3D3D3;
        text-align: center;
        font-size: 15px;
        padding: 0 10px;
        width: 28%;
    }
    .zin1:last-child {border-right: none;!important;}
    #zfm1{}

    #z2se2 {padding: 50px 0;text-align: center;}
    .z2d1 {display: flex;justify-content: space-between;margin: 26px 0;}
    .z2d2 {background: red;height: 300px;border-radius: 10px;position: relative;}
    .z2d1-1 {width: 25%;}
    .z2d1-2 {width: 30%;}
    .z2d1-3 {width: 40%;}
    .z2h1 {font-size: 35px;font-weight: 400;margin-bottom: 15px;}
    #z2d3 {flex-direction: row-reverse;}
    .z2d4 {text-align: left;padding: 20px;position: absolute;bottom: 0;left: 0;}
    .z2h2 {color: white;}
    .z2s1 {color: white;font-weight: 500;}
    .z2d2::before {content: "";display: block;width: 100%;height: 100%;background:url({{asset('web/img/effect/top-destination-effect.png')}});border-radius: 10px;background-size: cover;background-position-y: 300px;}

    #z3se1 {text-align: center;margin-bottom: 50px;}
    .z3h1 {font-size: 35px;font-weight: 400;margin-bottom: 50px;}
    .z3d1 {width: 30%;}
    .z3i1 {width: 100%;}
    .z3h2 {font-size: 20px;font-weight: 400;margin: 6px 0;}

    #z4se1 {background: url({{asset('web/img/section-image/Earn-and-Spend-Points-on-Your-Next-Getaway.png')}});margin-top: 80px;padding: 55px 0;background-size: cover;}
    .z4d1 {width: 36%;height: 500px;display: flex;flex-direction: column;justify-content: space-around;}
    #z4p1 {padding: 15px 0 4px;font-size: 15px;}
    #z4h1 {color: white;font-size: 35px;letter-spacing: 1px;margin: 0;}
    .z4a1 {text-decoration: navajowhite;border: 2px solid white;padding: 10px 32px;background: #f000;color: white;border-radius: 35px;width: max-content;}

    #z5se1 {text-align: center;padding: 50px 0;background: #F6F6F6;}
    .z5d1 {display: flex;justify-content: space-between;}
    .zd5d2 {width: 32%;}
    .z5h1{font-size: 35px;font-weight: 400;margin-bottom: 50px;}
    .z5i1 {width: 80px;}
    .z5h2 {font-size: 25px;}
    .z5p1 {color: #2f2f2f;font-family: "Cormorant Garamond", serif;font-size: 21px;}

    #z6se1 {text-align: center;padding:  50px 0;}
    .z6d1 {display: flex;justify-content: space-between;}
    .x1d1 {width: 32%;}
    .x1d2{position: relative;padding: 15px;height: 340px;display: flex;flex-direction: column;justify-content: space-between;}
    .x1d3 {display: flex;justify-content: space-between;position: relative;z-index: 10;}
    .x1s1 {background: #ACD24B;padding: 4px 15px;border-radius: 20px;color: white;}
    .x1i1 {width: 25px;}
    .x1d4 {display: flex;justify-content: space-between;position: relative;z-index: 10;}
    .xis2 {color: white;text-align: left;font-weight: 600;}
    .x1i2 {width: 90px;height: 23px;margin-top: 20px;}
    .x1d2::before {content: "";background: url({{assert('web/img/effect/top-destination-effect.png')}});position: absolute;left: 0;width: 100%;height: 100%;bottom: 0;z-index: 0;}
    .x1s4 {color: #7b7b7b;margin-left: 20px;position: relative;}
    .x1h2 {font-weight: 500;}
    .xid5 {background: #F2F1F1;border-radius: 0 0 10px 10px;padding: 15px;text-align: left;border: 1px solid #eeebeb;}

    #z7se1 {height: 300px;display: flex;justify-content: center;}
    #z7se1::before {content: "";background: #00000061;height: 300px;background-size: cover;position: absolute;width: 100%;left: 0;z-index: 0;}
    .z7d1 {width: 50%;height: 100%;display: flex;align-items: center;justify-content: center;}
    #z7d2{background: url({{asset('web/img/Cheers.png')}});background-size: cover;}
    #z7d3{background: url({{asset('web/img/Honeymoon.png')}});background-size: cover;}
    .z7h1 {color: white;font-size: 45px;}
    .z7p1 {padding: 0 0;font-size: 15px;}
    .z7d4 {position: relative;z-index: 3;}
    .z7a1 {text-decoration: none;color: white;margin-top: 32px;display: block;border: 4px solid white;width: max-content;padding: 10px 20px;border-radius: 42px;font-size: 16px;}

    #z8se1 {text-align: center;padding:  50px 0;}
    .z8d1 {display: flex;justify-content: space-between;}



    @media screen and (max-width:1570px) {
        #zfm1 {
            flex-direction: column;
        }
        .zd3 {
            flex-wrap: wrap;
            width: 90%;
            margin-bottom: 16px;
        }
       .zin1 {
           width: 50%;
           padding: 10px;
           border: none;
           margin: 8px 0;
           border-bottom: 1px solid;
        }
        .zd2 {
            border-radius: 25px;
        }
        #sbt{
            width: 100%;
        }

        section#z7se1 {
            flex-direction: column;
            height: 877px;
        }
        #z7se1::before {
            height: 100% !important;
        }
        div.z7d1 {
            width: 100%;
        }
    }

    @media screen and (max-width:720px) {
        .zin1 {
            width: 100%;}
        .zd1 {
            top: 23%;
        }
        .z3d1 {
            width: 48%;
        }
        .z4d1 {
            width: 100%;
        }
    }


    @media screen and (max-width:590px) {
        section#zse1 {
            height: 128vh;
        }
        .z2d2 {
            width: 100% !important;
            margin-bottom: 20px;
        }
        .z2d1 {
            flex-wrap: wrap;
        }

        .z3d1 {
            width: 100%;
        }
        .z5d1 {
            flex-wrap: wrap;
        }
        .zd5d2 {
            width: 100%;
        }
    }
</style>
</head>
<body>

@include('web/Blocks/nav')


@yield('content')


<footer id="ft">
    <div class="w fsb" id="footer1"   >
        <div class="d100">
            <img src="{{asset('web/img/icons/Logo.svg')}}" alt="" id="i100">
            <p class="p100" style="color: white">Stay up to date with our latest news, receive exclusive deals and more.Stay up to date with our latest news, receive exclusive deals and more.Stay up to date with our latest news, receive exclusive deals and more.Stay up to date with our latest news, receive exclusive deals and more.Stay up to date with our latest news, receive exclusive deals and more.Stay up to date with our latest news, receive exclusive deals and more.</p>
        </div>
        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="{{route('web.page.index')}}" class="a100">Home</a></li>
                <li class="l100"><a href="{{route('about-us')}}" class="a100">About Us</a></li>
                <li class="l100"><a href="{{route('web.page.list')}}" class="a100">Destinations</a></li>
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

<script type="text/javascript" src="{{asset('web/assets/js/maps.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('web/assets/slider/slider.js')}}"></script>

<!--[if lte IE 9]>
<script src="{{asset('web/assets/js/ie.js')}}"></script>
<![endif]-->

<script>
    var _latitude = 48.47292127;
    var _longitude = 4.28672791;
    var element = "map-item";
    var useAjax = true;
    bigMap(_latitude,_longitude, element, useAjax);

    var vish_elements = document.querySelectorAll('.x1i1');

    vish_elements.forEach(function(element) {
        element.addEventListener('click', function() {
            var dataInfo = this.getAttribute('data-id');
            var url = this.getAttribute('data-url');

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    if (this.responseText){
                        document.getElementById('id_'+dataInfo).style.background = '#b01010'
                    }else{
                        document.getElementById('id_'+dataInfo).style.background = '#91919100'
                    }
                }
            }
            xmlhttp.open("GET",url,true);
            xmlhttp.send();
        });
    });
</script>
</body>
</html>

