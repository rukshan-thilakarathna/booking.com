@include('web/Blocks/head')

<title>Document</title>
<style>
    #zse1 {background: url({{asset('web/img/section-image/Find-Your-Ideal-Stay-in-Paradise.png')}});height: 70vh;background-size: cover;position: relative;}
    .zd1 {position: absolute;width: 50%;display: flex;flex-direction: column;text-align: center;margin: auto;top: 33%;right: 0;left: 0;}
    .zh1 {color: white;font-size: 60px;font-weight:bold;font-family: "Cormorant Garamond", serif;}

    #zse1::before {content: "";display: block;width: 100%;height: 100%;background: #00000073;}
    .zd2 {padding: 15px 15px;background: white;border-radius: 72px;display: flex;justify-content: space-between;align-items: center;margin-top: 25px;}
    .zd3 {background: white;border-radius: 37px;display: flex;}
    .zin1 {border: none;outline: none;border-right: 1px solid #D3D3D3;text-align: center;font-size: 15px;color: #4e3636;width: 200px;}
    .zin1:last-child {border-right: none;}

    #z2se2 {padding: 50px 0;text-align: center;}
    .z2d1 {display: flex;justify-content: space-between;margin: 26px 0;}
    .z2d2 {background: red;height: 300px;border-radius: 10px;position: relative;}
    .z2d1-1 {width: 25%;}
    .z2d1-2 {width: 30%;}
    .z2d1-3 {width: 40%;}
    .z2h1 {font-size: 35px;font-weight: 400;margin-bottom: 50px;}
    #z2d3 {flex-direction: row-reverse;}
    .z2d4 {text-align: left;padding: 20px;position: absolute;bottom: 0;left: 0;}
    .z2h2 {color: white;}
    .z2s1 {color: white;font-weight: 500;}
    .z2d2::before {content: "";display: block;width: 100%;height: 100%;background:url({{asset('web/img/effect/top-destination-effect.png')}});border-radius: 10px;background-size: cover;background-position-y: 300px;}

    #z3se1 {text-align: center;margin-bottom: 50px;}
    .z3h1 {font-size: 35px;font-weight: 400;margin-bottom: 50px;}
    .z3d1 {width: 23%;}
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
    #z7d2{background: url({{assert('web/img/section-image/Cheers.png')}});background-size: cover;}
    #z7d3{background: url({{assert('web/img/section-image/Honeymoon.png')}});background-size: cover;}
    .z7h1 {color: white;font-size: 45px;}
    .z7p1 {padding: 0 0;font-size: 15px;}
    .z7d4 {position: relative;z-index: 3;}
    .z7a1 {text-decoration: none;color: white;margin-top: 32px;display: block;border: 4px solid white;width: max-content;padding: 10px 20px;border-radius: 42px;font-size: 16px;}

    #z8se1 {text-align: center;padding:  50px 0;}
    .z8d1 {display: flex;justify-content: space-between;}


    #ft {background: #07474B;border-bottom: 55px solid #16BECB;}
    .s100 {color: white;font-size: 22px;font-weight: 600;}
    .u100 {list-style: none;}
    .l100 {margin: 14px 0;}
    .a100 {text-decoration: none;color: white;}
    .d101 {width: 13%;}
</style>
</head>
<body>

@include('web/Blocks/nav')


@yield('content')


@include('web/Blocks/footer')
