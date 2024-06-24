<?php

define('ADMIN','admin');
define('USER','user');
define('API_TOKEN','28a47031-fb05-4eb1-a5ee-d5a1bca315c0');

$property_status = ["N/A","Actve","Waiting Approval","Hold","Suspend"];
$property_owner_verification_status = ["Unverified","Verified","Pending","Black List","Suspend"];
$user_status = ["N/A","Actve"];
$room_type_status = ["N/A","Actve"];
$room_status = ["N/A","Booking Available",'Booked'];
$review_status = ["Pending","Display web","Not Display web"];
$open_for_booking = ["Only Rooms","Full Property"];
$Property_Facility = ["Parking","Free Wifi","Restaurant","Pet friendly","Room service","24-hour front desk","Fitness center","Non-smoking rooms","Airport shuttle","Family rooms","Spa","Electric vehicle charging station","Wheelchair accessible","Swimming pool"];

return[
    'PropertyStatus'=>$property_status,
    'OpenForBooking'=>$open_for_booking,
    'PropertyOwnerVerificationStatus'=>$property_owner_verification_status,
    'UserStatus'=>$user_status,
    'RoomTypeStatus'=>$room_type_status,
    'RoomStatus'=>$room_status,
    'PropertyFacility'=>$Property_Facility,
    'ReviewStatus'=>$review_status,
];



