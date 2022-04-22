<?php
	session_start();
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
	{
		$status = "Votre code captcha est correct.";
    $messageCaptchaColor = "color: green";
	}else{
		$status = "Le code captcha entré ne correspond pas! Veuillez réessayer.";
    $messageCaptchaColor = "color: red";
	}
?>
