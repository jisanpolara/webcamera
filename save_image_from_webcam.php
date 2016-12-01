<?php 
$srcImg = imagecreatefrompng($_POST['image']);

$uploadWidth = 320; 
$uploadHeight = 240;
$srcImg = imagecreatetruecolor($uploadWidth, $uploadHeight);

foreach (explode("|", $_POST['image']) as $y => $cs)
 {
    foreach (explode(";", $cs) as $x => $color) {
        imagesetpixel($srcImg, $x, $y, $color);
    }
}

$filename = 'sample_img.png';
$destination = $_SERVER['DOCUMENT_ROOT'].'/webcamera/uploads/'.$filename;
$dstImg = @imagecreatetruecolor($uploadWidth, $uploadHeight);

imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $uploadWidth, $uploadHeight, $uploadWidth, $uploadHeight);
$write = imagepng($dstImg, $destination, 9);
 
imagedestroy($dstImg);

?>