@php use App\Models\Rooms; @endphp
@extends('web.Blocks.layout')

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
