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
                        <a href="/" style=" background: #ffffff; padding: 10px;font-size: 16px; border-radius: 10px;top: 14px;position: absolute;">Back To Home</a>
                    </div>
                    <div class="card text-black col-lg-4" style="border-radius: 10px;background: white;">
                    <div class="card-body " style="border-radius: 10px;padding: 0;">
                            <div style="width: 100%;" class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <h1 style="margin: 25px 0 0 36px;" class="h4 text-black mb-4">{{__('Forgot Password')}}</h1>
                                @if (session('success'))
                                    <div style="margin: 0 0 14px 36px;" class="alert alert-success">
                                        {{ session('success') }} <a href="{{route('web.login')}}" style="font-weight: bold">Login</a>
                                    </div>
                                @elseif (session('error'))
                                    <div style="margin: 0 0 14px 36px;" class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form class="mx-1 mx-md-4" method="post" action="{{route('user.forgot.password.post')}}">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mb-4" >
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

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button style="       background: #16BECB !important;color: white !important; font-weight: bold;" id="button-login" type="submit" class="btn btn-default btn-block" tabindex="3">
                                            <x-orchid-icon path="bs.box-arrow-in-right" class="small me-2"/>
                                            {{__('Forgot')}}
                                        </button>
                                    </div>
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

<script>
    function inputerror(x) {
        document.getElementById(x).style.display = 'none';
    }
</script>
</body>
</html>