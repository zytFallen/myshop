<?php
require_once 'string.func.php';

function getVerify($width = 110, $height = 60, $type = 1, $length = 4, $pix = 30, $line =3)
{
    session_start();
    $image = imagecreatetruecolor($width, $height);
    $while = imagecolorallocate($image, 255, 255, 255);
    $randColor = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagefilledrectangle($image, 0, 0, ($width - 1), ($height - 1), $while);
    $string = getRandstring($type, $length);
    for ($i = 0; $i < $length; $i ++) {
        $randString .= substr(str_shuffle($string), $i, 1);
    }
    $_SESSION["verify"] = $randString;
    for ($i = 0; $i < strlen($_SESSION["verify"]); $i ++) {
        $randColor = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        $size = mt_rand(20,25);
        $angle = mt_rand(- 15, 15);
        $x = 10 + $size * $i;
        $y = mt_rand(10, ceil($height * 4 / 5));
        $text = $_SESSION["verify"][$i];
        imagettftext($image, $size, $angle, $x, $y, $randColor, "../fonts/angsab.ttf", $text);
    }
    if ($pix > 0) {
        for ($i = 0; $i < $pix; $i ++) {
            $x = mt_rand(1, $width);
            $y = mt_rand(1, $height);
            imagesetpixel($image, $x, $y, $randColor);
        }
    }
    if ($line > 0) {
        for ($i = 0; $i < $line; $i ++) {
            $x1 = mt_rand(0, $width / 2);
            $x2 = mt_rand($width / 2, $width);
            $y1 = mt_rand($width / 2, $width);
            $y2 = mt_rand($height / 2, $height);
            $color = $randColor;
            imageline($image, $x1, $y1, $x2, $y2, $color);
        }
    }
    header("content-type:image/png");
    imagepng($image);
    imagedestroy($image);
}