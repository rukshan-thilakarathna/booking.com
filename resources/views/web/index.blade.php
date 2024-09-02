@extends('web.Blocks.layout')

@section('content')
    <style>
        p{color: white}
        #_1:before{
            content: '';
            position: absolute;
            width: 120%;
            bottom: 0;
            height: 4px;
            left: 0;
            background: var(--cyan);
            z-index: 1;
            margin-left: -4px;
        }
    </style>

{{--{{dd(Session::get('user'))}}--}}

    <section id="zse1">
        <div class="zd1">
            <h1 class="zh1">Find Your Ideal Stay in <br> Paradise</h1>
            <p>Discover the Perfect Accommodation for Your Dream Vacation</p>
            <div class="zd2">
                <form id="zfm1" action="{{route('web.page.list')}}" method="GET" style="display: flex;align-items: center;width: 100%;justify-content: space-between;">
                <div class="zd3">

                    <!-- <input  name="checkIn" required type="date" class="zin1" onfocus="this.placeholder='Select a date'">-->
                    <input onfocus="show()" name="dates" required type="text" id="dates" class="zin1" placeholder="Select a date">
                    <select name="destination" class="zin1" >
                        <option class="op" value="">Destinations</option>
                        @foreach($destinations as $key => $destination)
                            <option class="op" style="text-align: left" value="{{$destination->id}}">{{$destination->name_en}}</option>
                        @endforeach
                    </select>
                    <input id="Guest"  name="adult" required type="number" class="zin1" placeholder="Guest">
                </div>
                <button id="sbt" type="submit" class="bt1">Search</button>
                </form>
                
            </div>
        </div>
    </section>

    <script>

$(function(){
  
  var startDate, endDate;
  
  var datepicker = {
        container: $("#datepicker"),
        dateFormat: 'mm/dd/yy',
        dates: [null, null],
        status: null,
        inputs: {
            checkin: $('#checkin'),
            checkout: $('#checkout'),
            dates: $('#dates')
        }
    };

datepicker.container.datepicker({
  numberOfMonths: 2,
  dateFormat: datepicker.dateFormat,
  minDate: 0,
  maxDate: null,

  beforeShowDay: function(date) {
    var highlight = false,
        currentTime = date.getTime(),
        selectedTime = datepicker.dates,
        checkin_date = selectedTime[0] ? new Date(selectedTime[0]) : null,
        checkout_date = selectedTime[1] ? new Date(selectedTime[1]) : null,
        checkin_timestamp,
        checkout_timestamp,
        classes = 'ui-datepicker-highlight';
    
    date.setHours(0);
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);

    currentTime = date.getTime();
    
    // CHECKIN/CHECKOUT CLASSES
     if(checkin_date) {
       checkin_date.setHours(0);
       checkin_date.setMinutes(0);
       checkin_date.setSeconds(0);
       checkin_date.setMilliseconds(0);
       checkin_timestamp = checkin_date.getTime();

       startDate = checkin_timestamp;
     }

    if(checkout_date) {
      checkout_date.setHours(0);
      checkout_date.setMinutes(0);
      checkout_date.setSeconds(0);
      checkout_date.setMilliseconds(0);
      checkout_timestamp = checkout_date.getTime();

      endDate = checkout_timestamp;
    }

    if ( checkin_timestamp && currentTime == checkin_timestamp ) {
      classes = 'ui-datepicker-highlight ui-checkin';
    } else if (checkout_timestamp && currentTime == checkout_timestamp) {
      classes = 'ui-datepicker-highlight ui-checkout';
    }

    // Highlight date range
    if ((selectedTime[0] && selectedTime[0] == currentTime) || (selectedTime[1] && (currentTime >= selectedTime[0] && currentTime <= selectedTime[1]))) highlight = true;

    return [true, highlight ? classes : ""];
  },
  onSelect: function(dateText) {

    if (!datepicker.dates[0] || datepicker.dates[1] !== null) {
      // CHOOSE FIRST DATE
      
      // fill dates array with first chosen date
      datepicker.dates[0] = $.datepicker.parseDate(datepicker.dateFormat, dateText).getTime();
      datepicker.dates[1] = null;
      
      // clear all inputs
	    datepicker.inputs.checkin.val('');
      datepicker.inputs.checkout.val('');
	    datepicker.inputs.dates.val('');
      
      // set current datepicker state
      datepicker.status = 'checkin-selected';
      
      // create mouseover for table cell
      $('#datepicker').delegate('.ui-datepicker td', 'mouseover', function(){
        
        // if it doesn't have year data (old month or unselectable date)
        if ($(this).data('year') == undefined) return;
        
        // datepicker state is not in date range select, depart date wasn't chosen, or return date already chosen then exit
        if (datepicker.status != 'checkin-selected') return;
        
        // get date from hovered cell
        var hoverDate = $(this).data('year')+'-'+($(this).data('month')+1)+'-'+$('a',this).html();
        
        // parse hovered date into milliseconds
        hoverDate = $.datepicker.parseDate('yy-mm-dd', hoverDate).getTime();
        
        $('#datepicker td').each(function(){
          
          // compare each table cell if it's date is in date range between selected date and hovered
          if ($(this).data('year') == undefined) return;
          
          var year = $(this).data('year'),
              month = $(this).data('month'),
              day = $('a', this).html();
            
          var cellDate = $(this).data('year')+'-'+($(this).data('month')+1)+'-'+$('a',this).html();
          
          // convert cell date into milliseconds for further comparison
          cellDate = $.datepicker.parseDate('yy-mm-dd', cellDate).getTime();

          if ( (cellDate >= datepicker.dates[0] && cellDate <= hoverDate) || (cellDate <= datepicker.dates[0] && cellDate >= hoverDate) ) {
              $(this).addClass('ui-datepicker-hover');
            } else {
              $(this).removeClass('ui-datepicker-hover');
            }

        });
      });

  } else {
    // CHOOSE SECOND DATE
    
    // push second date into dates array
    datepicker.dates[1] = $.datepicker.parseDate(datepicker.dateFormat, dateText).getTime();
    
    // sort array dates
	  datepicker.dates.sort();

    var checkInDate = $.datepicker.parseDate('@', datepicker.dates[0]);
    var checkOutDate = $.datepicker.parseDate('@', datepicker.dates[1]);
    
    datepicker.status = 'checkout-selected';
	            
//fill input fields
   datepicker.inputs.checkin.val($.datepicker.formatDate(datepicker.dateFormat, checkInDate));
	            datepicker.inputs.checkout.val($.datepicker.formatDate(datepicker.dateFormat, checkOutDate)).change();
	            datepicker.inputs.dates.val(datepicker.inputs.checkin.val() + ' - ' + datepicker.inputs.checkout.val());

            }
        }
    });
});

    </script>



    <section id="z2se2">
        <div class="w">
            <h1 class="z2h1">Destinations</h1>
            @php
                $class = [1,2,3,1,2,3];
            @endphp
            <div class="z2d1">
                @foreach($propertiesDestinations as $key => $PropertyDestination)
                    @if($key <= 2)
                        <div class="z2d2 z2d1-{{$class[$key]}}"
                             style="background: url({{asset('web/img/destinations/'.$PropertyDestination->district->url.'.jpg')}});background-size: cover;background-position: center;">
                            <div class="z2d4">
                                <a href="list?destination={{$PropertyDestination->district->id}}"><h2 class="z2h2">{{$PropertyDestination->district->name_en}}</h2></a>
                                <span class="z2s1">{{$uniquePropertyCount[$PropertyDestination->main_location]}} Properties</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="z2d1" id="z2d3">

                @foreach($propertiesDestinations as $key => $PropertyDestination)

                    @if( $key > 2 && $key <= 5)
                        <div class="z2d2 z2d1-{{$class[$key]}}"
                             style="background: url({{asset('web/img/destinations/'.$PropertyDestination->district->url.'.jpg')}});;background-size: cover;background-position: center;">
                            <div class="z2d4">
                                <a href="list?destination={{$PropertyDestination->id}}"><h2 class="z2h2">{{$PropertyDestination->district->name_en}}</h2></a>
                                <span class="z2s1">{{$uniquePropertyCount[$PropertyDestination->main_location]}} Properties</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="z3se1">
        <div class="w">
            <h1 class="z3h1">Find Your Perfect Accommodation</h1>
            <div class="fsb" style="
    flex-wrap: wrap;
">
                @foreach($propertyTypes as $key => $PropertyType)
                    <div class="z3d1">
                        <img class="z3i1" src="{{asset('web/img/property-type/'.$PropertyType->name.'.jpg')}}"
                             alt="Find-Your-Perfect-Accommodation-Hotels">
                        <a  href="list?ptpt%5B%5D={{$PropertyType->id}}"><h2 style="color: black;font-weight: 600;margin-top: 0px;background: #cbcbcb;padding: 6px 0;"  class="z3h2">{{$PropertyType->name}}</h2></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="z4se1">
        <div class="w">
            <div class="z4d1">
                <hgroup id="z4hg1">
                    <p id="z4p1">Unlock More Value with Every Booking!</p>
                    <h1 id="z4h1">Earn and Spend Points on Your Next Getaway!</h1>
                </hgroup>
                <a href="{{route('points.buy')}}" class="z4a1">Join the Points Revolution!</a>
            </div>
        </div>
    </section>

    <section id="z5se1">
        <div class="w">
            <h1 class="z5h1">Why Choose Barterbed</h1>
            <div class="z5d1">
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Extensive-Selection.svg')}}" alt="Extensive Selection"
                         class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Secure-and-Convenient-Booking.svg')}}"
                         alt="Secure and Convenient Booking" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
                <div class="zd5d2">
                    <img src="{{asset('web/img/icons/Personalized-Recommendations.svg')}}"
                         alt="Personalized Recommendations" class="z5i1">
                    <h2 class="z5h2">Extensive Selection</h2>
                    <p class="z5p1">Lorem Ipsum is simply dummy text of the printing ages and.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="z6se1">
        <div class="w wrapper">
            <ul class="carousel">

                @foreach($PromotionBar01 as $PromotionCard)
                    @php
                        $image_array = explode(',', $PromotionCard->image);
                        $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                    @endphp
                    <li class="card">
                        <div class="x1d1" style="width:100%">
                            <div class="x1d2" style="background: url({{asset('Property/Images/'.$image_array[0])}});  background-size: cover;">
                                <div class="x1d3">
                                </div>
                                <div class="x1d4">
                                    <img id="id_{{$PromotionCard->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{in_array($PromotionCard->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                </div>
                            </div>
                            <div class="xid5">
                                <a href="{{route('web.page.detail',$PromotionCard->id)}}"><h2 class="x1h2">{{$PromotionCard->name}}</h2></a>
                                <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section id="z7se1">
        <div class="z7d1" id="z7d3">
            <div class="z7d4">
                <h1 class="z7h1">Honeymoon Haven</h1>
                <p class="z7p1">Romantic Escapes at Unbeatable Prices!</p>
            </div>
        </div>
        <div class="z7d1" id="z7d2">
            <div class="z7d4">
                <h1 class="z7h1">Weekend Getaway Bonanza</h1>
                <p class="z7p1">Your Ticket To Relaxation!</p>
            </div>
        </div>
    </section>

    {{--  <section id="z8se1">
        <div class="w">
            <h1 class="z5h1">Explore Our Top-rated Stays</h1>
            <div class="z8d1">
                <div class="w wrapper">
                    <ul class="carousel">

                        @foreach($PromotionBar02 as $PromotionCard)
                            @php
                                $image_array = explode(',', $PromotionCard->image);
                                $wishlist_array = Auth::check() ? explode(',', $userupdateWishList->wishlist) : [];
                            @endphp
                            <li class="card">
                                <div class="x1d1" style="width:100%">
                                    <div class="x1d2" style="background: url({{asset('Property/Images/'.$image_array[0])}});  background-size: cover;">
                                        <div class="x1d3">
                                        </div>
                                        <div class="x1d4">
                                        <img id="id_{{$PromotionCard->id}}" style="border-radius: 17px;width: 35px;height: 35px;padding: 7px;" data-url="{{ route('web.add-wishlist', $PromotionCard->id) }}"  data-id="{{$PromotionCard->id}}" src="{{in_array($PromotionCard->id,$wishlist_array) ? asset('web/heart.png') : asset('web/heart2.png')}}" alt="hart" class="x1i1">
                                        </div>
                                    </div>
                                    <div class="xid5">
                                        <a href="{{route('web.page.detail',$PromotionCard->id)}}"><h2 class="x1h2">{{$PromotionCard->name}}</h2></a>
                                        <span><img src="{{asset('web/img/icons/Location.svg')}}" alt=""><span style="margin: 2px;" class="x1s4">{{$PromotionCard->district->name_en}} , {{$PromotionCard->city->name_en}}</span></span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>  --}}


@endsection


