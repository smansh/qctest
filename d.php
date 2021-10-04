<?php 
    
// Assign image file to variable 
$image_name = 'logo.png'; 
     
// Load image file 
$image = imagecreatefrompng($image_name);  
  
// Use imagerotate() function to rotate the image
$img = imagerotate($image, 180, 0);
  
// Output image in the browser 
header("Content-type: image/png"); 
  
imagepng($img); 
  
?> 