<?php

header('Content-type: image/jpeg');

if(isset($_GET['email']))
{
	$email = $_GET['email'];
	$email_leng = strlen($email);
	
	$font_size = 4;
	$imageHeight = imagefontheight($font_size);
	$imageWidth = imagefontwidth($font_size) * $email_leng;
	
	$image = imagecreate($imageWidth, $imageHeight);
	
	imagecolorallocate($image, 255, 255, 255);
	
	$font_color = imagecolorallocate($image, 0, 0, 0);
	
	imagestring($image, $font_size, 0, 0, $email, $font_color);
	imagejpeg($image);
}


?>