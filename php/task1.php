<?php
header('Content-type: image/png');
//"Hole" die notwendigen Bilder
$image1 = imagecreatefrompng('background.png');
$image2 = imagecreatefrompng('wmslogo.png');

//Führt die Funktionen aus
$image1 = add_text($image1);
join_up($image1, $image2);


//Text hinzufügen
function add_text($image)
{
    //Farbe Weiss festlegen
    $white = imagecolorallocate($image, 255, 255, 255);

    //Schriftart festlegen
    $font = "C:\Windows\Fonts\arial.ttf";

    //Texte auf das Hintergrundbild hinzufügen
    imagettftext($image, 124, 0, 205, 324, $white, $font, "ERIK STEINACHER");
    imagettftext($image, 84, 0, 205, 454, $white, $font, "I 2B");

    return $image;
}

//Bilder zusammensetzen
function join_up($image1, $image2)
{

    //Bilder Grössen
    $width = imagesx($image1);
    $height = imagesy($image1);

    //Berechne die Mitte des 1. Bildes
    $centerX = $width / 2;
    $centerY = $height / 2;

    //Bilder Grössen von Bild 2
    $width = imagesx($image2);
    $height = imagesy($image2);

    //Berechne die Mitte des 1. Bildes minus die Grössen 
    //des 2. Bildes um das 2. Bild mittig zu platzieren
    $centerX = $centerX - $width / 2;
    $centerY = $centerY - $height / 2;

    //Beide Bilder zusammenfügen
    imagecopy($image1, $image2, $centerX, $centerY, 0, 0, 800, 275);

    //Output
    imagepng($image1);

    //Freilegung des Speichers
    imagedestroy($image1);
    imagedestroy($image2);
}
