<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    @if(\Orchid\Support\Locale::currentDir(app()->getLocale()) == "rtl")
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid.rtl.css','vendor/orchid') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid.css','vendor/orchid') }}">
    @endif
    <style>
       
        @if($role == 'user')
            #rika1{
            width: 49%;
            background: #16BECB;
            border-radius: 7px 0 0 0;
            margin: 3px;
            padding: 10px;
            justify-content: center;
            display: flex;
        }
        #rika2{
            width: 49%;
            background: white;
            border: 2px solid #16BECB;
            border-radius: 0px 7px 0 0;
            margin: 3px;
            padding: 10px;
            justify-content: center;
            display: flex;
        }
        @else
        #rika1{
            width: 49%;
            background: white;
            border: 2px solid #16BECB;
            border-radius: 7px 0 0 0;
            margin: 3px;
            padding: 10px;
            justify-content: center;
            display: flex;
        }
        #rika2{
            width: 49%;
            background: white;
            background: #16BECB;
            border-radius: 0px 7px 0 0;
            margin: 3px;
            padding: 10px;
            justify-content: center;
            display: flex;
        }
        @endif


        #rika1:hover{
            background: #0F8D8D;
            font-weight: bold;
        }
        #rika2:hover{
            background: #0F8D8D;
            font-weight: bold;
        }

    </style>
</head>
<body >
<section class="vh-100 rik_login" style="background-color: #ffffff;">
<div class="col-12 rik_login" >
                <div class="row" style="
    height: 100vh;
    display: flex;
    align-items: center;
">
                <div class="container-md col-8" style="background:url('http://localhost:8000/web/img/69ca67f002.jpg');background-size: cover;background-position: 0 -190px;position: relative;height: 100vh;">
                    <a href="/" style="
            background: #ffffff;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            top: 14px;
            position: absolute;
        ">Back To Home</a>
                    </div>
                    <div class="card text-black col-lg-4" style="border-radius: 10px;background: white;">
                        <div style="display: flex;width: 100%;">
                            <a id="rika1" href="{{route('user.registration','user')}}">user register</a>
                            <a id="rika2" href="{{route('user.registration','property-owner')}}">property owner register</a>
                        </div>

                        <div class="card-body " style="border-radius: 10px;padding: 0;">
                        <div style="width: 100%;" class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <h1 style="margin: 25px 0 0 36px;" class="h4 text-black mb-4">{{__('Sign up now - ' . $role)}}</h1>

                                    <form class="mx-1 mx-md-4" method="post" action="{{route('user.store',$role)}}">
                                        @csrf
                                        <input type="hidden"  value="{{$role}}" name="role">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Name</label>
                                                <input placeholder="Enter your name" type="text" onfocus="inputerror('name')" id="form3Example1c" name="name" class="form-control" value="{{old('name') ?? ""}}" />
                                                @if ($errors->has('name'))
                                                    <div class="alert" style="color: red;margin: 0;padding: 0;" id="name"  >
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Email</label>
                                                <input placeholder="Enter your email" type="email" onfocus="inputerror('email')" id="form3Example3c" name="email" class="form-control" value="{{old('email') ?? ""}}" />
                                                @if ($errors->has('email'))
                                                    <div class="alert" style="color: red;margin: 0;padding: 0;" id="email" >
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input placeholder="Enter your password" type="password" onfocus="inputerror('passwd')" name="passwd" id="form3Example4c" class="form-control" value="{{old('passwd') ?? ""}}" />
                                                @if ($errors->has('passwd'))
                                                    <div class="alert" style="color: red;margin: 0;padding: 0;" id="passwd" >
                                                        {{ $errors->first('passwd') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Repeat password</label>
                                                <input placeholder="Enter Repeat password" type="password" onfocus="inputerror('repasswd')" name="repasswd" id="form3Example4cd" class="form-control" value="{{old('repasswd') ?? ""}}" />
                                                @if ($errors->has('repasswd'))
                                                    <div class="alert" style="color: red;margin: 0;padding: 0;" id="repasswd" >
                                                        {{ $errors->first('repasswd') }}
                                                    </div>
                                                @endif
                                            </div>

                                        </div>


                                        </span>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button style="       background: #16BECB !important;
        color: white !important;
        font-weight: bold;" id="button-login" type="submit" class="btn btn-default btn-block" tabindex="3">
                                                <x-orchid-icon path="bs.box-arrow-in-right" class="small me-2"/>
                                                {{__('Register')}}
                                            </button>
                                        </div>

    {{--                                    <span class="text-muted" style="    width: 62%;--}}
    {{--    display: block;--}}
    {{--    margin: 20px auto;"> {{__("Sign Up - ")}}--}}
    {{--                                        <a href="{{route('user.registration','user')}}" style="cursor: pointer ; font-weight: bold" class="small">--}}
    {{--                                            {{__("User")}}--}}
    {{--                                        </a>--}}
    {{--                                        /--}}
    {{--                                         <a href="{{route('user.registration','property-owner')}}" style="cursor: pointer ; font-weight: bold" class="small">--}}
    {{--                                            {{__("Property Owner")}}--}}
    {{--                                        </a>--}}
    {{--                                        /--}}
    {{--                                         <a href="{{route('user.registration','worker')}}" style="cursor: pointer ; font-weight: bold" class="small">--}}
    {{--                                            {{__("Worker")}}--}}
    {{--                                        </a>--}}

                                    </form>

                                </div>

                        </div>
                    </div>
               </div>
            </div>
</section>
<script>
    function inputerror(x) {
        document.getElementById(x).style.display = 'none';
    }
</script>
</body>
</html>
