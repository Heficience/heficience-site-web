<?php
	session_start();
	$code=rand(1000,9999);
	$_SESSION["code"]=$code;
	$image = imagecreatetruecolor(50, 24);
	$background = imagecolorallocate($image, 85, 174, 89); //background color
	$foreground = imagecolorallocate($image, 255, 255, 255);//text color
	imagefill($image, 0, 0, $background);
	imagestring($image, 5, 5, 5,  $code, $foreground);
	header("Cache-Control: no-cache, must-revalidate");
	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);
?>
