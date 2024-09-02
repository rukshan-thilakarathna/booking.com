@php use App\Models\Rooms; @endphp
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
            <section>
                <form class="labels-uppercase clearfix">
                    <h2>Contact Form</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-contact-name">Your Name<em>*</em></label>
                                <input type="text" class="form-control" id="form-contact-name" name="location" placeholder="Name" required="">
                            </div>
                        </div>
                        <!--end col-md-6-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-contact-email">Your Email<em>*</em></label>
                                <input type="email" class="form-control" id="form-contact-email" name="location" placeholder="Email" required="">
                            </div>
                        </div>
                        <!--end col-md-6-->
                    </div>
                    <!--end row-->
                    <div class="form-group">
                        <label for="form-contact-message">Your Message<em>*</em></label>
                        <textarea class="form-control" id="form-contact-message" rows="8" name="form-contact-message" required="" placeholder="Message"></textarea>
                    </div>
                    <!--end form-group-->
                    <div id="form-status" class="pull-left"></div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Send Message</button>
                    </div>
                    <!--end form-group-->
                </form>
                <!--end form-->
            </section>
        </div>
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
