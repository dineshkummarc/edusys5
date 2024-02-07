<?php
$image1 = 'idcard.jpeg';
$image2= 'myphoto.png';

list($width,$height) = getimagesize($image2);

$image1 =imagecreatefromstring(file_get_contents($image1));
$image2 =imagecreatefromstring(file_get_contents($image2));
//imagecopymerge(dst_im,src_im,dst_x,dst_y,src_x,src_y,src_w,src_h,pct);
imagecopymerge($image1, $image2, 100, 138, 0, 0, $width, $height, 100);

$font = "BebasNeue-Regular.ttf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);
$name = "Musthafa MA";
$text1 = imagettftext($image1,20,0,100,309,$white,$font,$name);

$issued_on = "31-05-2022";
$text1 = imagettftext($image1,12,0,130,380,$black,$font,$issued_on);

$expiry = "31-05-2024";
$text1 = imagettftext($image1,12,0,130,423,$black,$font,$expiry);

$birthday = "13-04-1986";
$text1 = imagettftext($image1,12,0,130,460,$black,$font,$birthday);

$dept = "ECE";
$text1 = imagettftext($image1,12,0,130,504,$black,$font,$dept);

header('Content-Type: image/png');
//imagejpeg($image1,$name);
imagepng($image1,$name.".png");

imagepng($image1);