<?php

define('ADMIN','admin');
define('USER','user');
define('API_TOKEN','28a47031-fb05-4eb1-a5ee-d5a1bca315c0');

$property_status = ["N/A","Actve","Waiting Approval","Hold","Suspend"];
$property_owner_verification_status = ["Unverified","Verified","Pending","Black List","Suspend"];
$user_status = ["N/A","Actve"];
$review_status = ["Pending","Display Web","Not Display Web"];

return[
    'PropertyStatus'=>$property_status,
    'PropertyOwnerVerificationStatus'=>$property_owner_verification_status,
    'UserStatus'=>$user_status,
    'ReviewStatus'=>$review_status,
];



