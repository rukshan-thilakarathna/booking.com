 // check if element is available to bind ITS ONLY ON HOMEPAGE
 var currentDate = moment().format("DD-MM-YYYY");

 $('.date').daterangepicker({
     locale: {
           format: 'DD-MM-YYYY'
     },
     "alwaysShowCalendars": true,
     "minDate": 'checkin',
     "maxDate": 'checkout',
     autoApply: true,
     autoUpdateInput: true
 }, function(start, end, label) {
   // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
   // Lets update the fields manually this event fires on selection of range
   var selectedStartDate = start.format('DD-MM-YYYY'); // selected start
   var selectedEndDate = end.format('DD-MM-YYYY'); // selected end

   $checkinInput = $('#search_checkin');
   $checkoutInput = $('#search_checkout');

   // Updating Fields with selected dates
   $checkinInput.val(selectedStartDate);
   $checkoutInput.val(selectedEndDate);

   // Setting the Selection of dates on calender on CHECKOUT FIELD (To get this it must be binded by Ids not Calss)
   var checkOutPicker = $checkoutInput.data('daterangepicker');
   checkOutPicker.setStartDate(selectedStartDate);
   checkOutPicker.setEndDate(selectedEndDate);

   // Setting the Selection of dates on calender on CHECKIN FIELD (To get this it must be binded by Ids not Calss)
   var checkInPicker = $checkinInput.data('daterangepicker');
   checkInPicker.setStartDate(selectedStartDate);
   checkInPicker.setEndDate(selectedEndDate);
   console.log("hello")

 });
