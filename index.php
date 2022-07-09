<?php

$Image_Name = 'Image.jpg';
$Stamp_Image = 'Stamp.png';


$Image_Size = getimagesize($Image_Name);
$Stamp_Image_Size = getimagesize($Stamp_Image);


$Image_1 = imagecreatefromjpeg($Image_Name);
$Image_2 = imagecreatefrompng($Stamp_Image);
echo "<img src=\"" . $Image_Name . "\">";

var_dump($Stamp_Image_Size);

$Marge_Right = $Image_Size[0] - $Stamp_Image_Size[0] - 20;
$Marge_Bottom = $Image_Size[1] - $Stamp_Image_Size[1] - 20;


$Image_SX = imagesx($Image_2);
$Image_SY = imagesy($Image_2);

imagecopy($Image_1,$Image_2,imagesx($Image_1) - $Image_SX - $Marge_Right,imagesy($Image_1) - $Image_SY - $Marge_Bottom,0,0,imagesx($Image_2),imagesy($Image_2));

$Stamped_Image = 'Stamped_Image.png';
imagepng($Image_1,$Stamped_Image);
echo "<br /><br />";
echo "<img src=\"" . $Stamped_Image . "\">";
imagedestroy($Image_1);
imagedestroy($Image_2);