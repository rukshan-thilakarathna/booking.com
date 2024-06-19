<?php

// ---------------------------------------------------------------------------------------------------------------------
// Here comes your script for loading from the database.
// ---------------------------------------------------------------------------------------------------------------------

// Remove this example in your live site -------------------------------------------------------------------------------

$url = "";
$type = "";
$title = "";
$location = "";
$image = "";
$rating = "";
$beds = "";

ob_start();
include 'locations.php';
ob_end_clean();

for( $i=0; $i < count($locations); $i++){
    if( $locations[$i]['id'] == $_POST['id'] ){
        $url = $locations[$i]['url'];
        $type = $locations[$i]['type'];
        $title = $locations[$i]['title'];
        $location = $locations[$i]['location'];
        $image = $locations[$i]['image'];
        $rating = $locations[$i]['rating'];
        $beds = $locations[$i]['beds'];
    }
}

// End of example ------------------------------------------------------------------------------------------------------

// Infobox HTML code

echo
'<a href="'. $url .'" class="infobox-inner">
    <div class="image-wrapper">
        <div class="label-wrapper">
            <figure class="label label-info">'. $type .'</figure>
        </div>
        <div class="wrapper">
            <div class="info">
                <h3>'. $title .'</h3>
                <figure class="location">'. $location .'</figure>
            </div>
        </div>
        <div class="image" style="background-image: url('. $image .')"></div>
    </div>
    <div class="meta">
        <span><i class="fa fa-star"></i>'. $rating .'</span>
        <span><i class="fa fa-bed"></i>'. $beds .'</span>
    </div>
</a>';
