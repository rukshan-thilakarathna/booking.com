
$(document).ready(function() {
  var dates = $("#dates");

  var city = $("#city");
  var Guest = $("#Guest");

  // Show datepicker on focus
  dates.focus(function() {
      $("#datepicker").css("display", "block");
  });

 

  // Hide datepicker on focus out
  city.focus(function() {
      $("#datepicker").css("display", "none");
  });
  Guest.focus(function() {
    $("#datepicker").css("display", "none");
});
});


$(function(){
  

var startDate, endDate;


var datepicker = {
      container: $("#datepicker"),
      dateFormat: 'mm-dd-yy',
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
