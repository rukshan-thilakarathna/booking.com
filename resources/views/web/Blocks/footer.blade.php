<footer id="ft">
    <div class="w fsb">
        <div class="d100">
            <img src="{{asset('web/img/icons/Logo.svg')}}" alt="" id="i100">
            <p class="p100" style="color: white">Stay up to date with our latest news, receive exclusive deals and more.</p>
        </div>
        <div class="d101">
            <span class="s100">Links</span>
            <ul class="u100">
                <li class="l100"><a href="" class="a100">Home</a></li>
                <li class="l100"><a href="" class="a100">About Us</a></li>
                <li class="l100"><a href="" class="a100">Destinations</a></li>
                <li class="l100"><a href="" class="a100">Accommodations</a></li>
                <li class="l100"><a href="" class="a100">Contact Us</a></li>
            </ul>
        </div>

        <div class="d101">
            <span class="s100">Contacts</span>
            <ul class="u100">
                <li class="l100"><a href="" class="a100">barterbed@slt.net</a></li>
                <li class="l100"><a href="" class="a100">(+94) 11 222 3334</a></li>
                <li class="l100"><a href="" class="a100">(+94) 11 222 5555</a></li>
                <li class="l100"><a href="" class="a100">Accommodations</a></li>
            </ul>
        </div>
    </div>
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

<!--[if lte IE 9]>
<script src="{{asset('web/assets/js/ie.js')}}"></script>
<![endif]-->

<script>
    var _latitude = 48.47292127;
    var _longitude = 4.28672791;
    var element = "map-item";
    var useAjax = true;
    bigMap(_latitude,_longitude, element, useAjax);
</script>
</body>
</html>
