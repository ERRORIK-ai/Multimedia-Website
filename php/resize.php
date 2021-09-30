<?php

//Alles aus den Ordnern Bilder und Thumbnails löschen
array_map('unlink', array_filter((array) glob("Bilder/*")));
array_map('unlink', array_filter((array) glob("Thumbnails/*")));


//"Loope" jedes JPG Datei im Ordner Uploads
$dir = 'uploads/';
foreach (glob($dir . '*.{jpg,JPG,jpeg,JPEG}', GLOB_BRACE) as $file) {


    //Erhalte Höhe und Breite des Bildes
    list($width, $height) = getimagesize($file);

    //Kreiere bearbeitbares JPG Bild
    $src = imagecreatefromjpeg($file);

    //Berechne das Seitenverhältnis beim Thumbnail max 200p
    $w = $width;
    $h = $height;
    if ($w > 200) {
        $aspect_ratio = 200 / $w;
        $h = $h * $aspect_ratio;
        $w = $w * $aspect_ratio;
    }

    //Berechne das Seitenverhältnis beim "normalen Bild" max 500p
    $w2 = $width;
    $h2 = $height;
    if ($w2 > 500) {
        $aspect_ratio = 500 / $w2;
        $h2 = $h2 * $aspect_ratio;
        $w2 = $w2 * $aspect_ratio;
    }

    //Kreiere "leeres schwarzes" Bild
    $tmp = imagecreatetruecolor($w, $h);
    $tmp2 = imagecreatetruecolor($w2, $h2);

    //Bilder mit der neuen Grösse erstellen und einfügen
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $w2, $h2, $width, $height);

    //Bilder in die jeweiligen Ordner abspeichern
    imagejpeg($tmp, "Thumbnails/" . basename($file));
    imagejpeg($tmp2, "Bilder/" . basename($file));

    //Bilder werden in der Gallery angezeigt
    show($tmp, $file);

    //Freilegung des Speichers
    imagedestroy($tmp);
    imagedestroy($tmp2);
}


function show($tmp, $file)
{
    //COPY PASTE |
    //           \/

    // Begin capturing the byte stream
    ob_start();
    // generate the byte stream
    imagejpeg($tmp, NULL, 100);
    // and finally retrieve the byte stream
    $rawImageBytes = ob_get_clean();
    echo "<div class='col-lg-3 col-md-4 col-6'><a href='Bilder/" . basename($file) . "'><img src='data:image/jpeg;base64," . base64_encode($rawImageBytes) . "'     class='w-100 shadow-1-strong rounded mb-4'
    alt=''/></a></div>";
}



//https://stackoverflow.com/a/25636274
//https://stackoverflow.com/questions/24227323/how-to-resize-image-using-gd-library-php