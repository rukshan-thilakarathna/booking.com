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

return[
    'PropertyStatus'=>$property_status,
    'OpenForBooking'=>$open_for_booking,
    'PropertyOwnerVerificationStatus'=>$property_owner_verification_status,
    'UserStatus'=>$user_status,
    'RoomTypeStatus'=>$room_type_status,
    'RoomStatus'=>$room_status,
    'ReviewStatus'=>$review_status,
];



