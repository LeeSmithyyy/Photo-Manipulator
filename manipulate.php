<?php
//THIS WORKS FINE ------------------------
// Load the image
// $logo = imagecreatefrompng('./test.png');

// // Apply a very soft scatter effect to the image
// imagefilter($logo, IMG_FILTER_NEGATE);

// // Output the image with the scatter effect
// header('Content-Type: image/png');
// imagepng($logo);
// imagedestroy($logo);
// TO HERE-----------------------------------

$target_dir = "uploads/manipulated/";
$filter = '';

$filterInput = $_POST['effects'];
if ($filterInput === 'BandW'){
  $filter = 'IMG_FILTER_GRAYSCALE';
} else if ($filterInput === 'negative'){
  $filter = 'IMG_FILTER_NEGATE';
} else {
  $filter = 'IMG_FILTER_CONTRAST';
}
echo $filter; //SHOWS FILTER TEXT CORRECT


// NEED TO CHECK FOR IMAGE TYPE STILL


$imagesName = $_POST['images'];
foreach ($imagesName as $image){
  // echo $image; //SHOWS FILE NAME
  // echo '<img src="', $image , '"/>'; // WILL SHOW IMAGE UNTIL HEADER
  $temp = imagecreatefrompng($image); //create temp image
  imagefilter($temp, $filter); //apply filter
  header('Content-Type: image/png');
  imagepng($temp);
  imagedestroy($temp);
 }

?>