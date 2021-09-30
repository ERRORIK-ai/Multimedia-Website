<?php
$dir = "uploads/";
$file = $dir . basename($_FILES["jpgfile"]["name"]);
$haserror = 1;

$temp = explode(".", $_FILES["jpgfile"]["name"]);
$neuername = round(microtime(true)) . '.' . end($temp);

$imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

//Kontrolliere ob das Bild wirklich ein Bild ist oder nicht
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["jpgfile"]["tmp_name"]);
    if ($check !== false) {
        echo "Datei ist Bild:  - " . $check["mime"] . ".<br />";
    } else {
        echo "Datei ist kein Bild.<br />";
        $haserror = 0;
    }
}

//Kontrolliere ob das Bild nicht zu gross ist
if ($_FILES["jpgfile"]["size"] > 500000) {
    echo "Das Bild ist zu gross (max. 500'000 bytes).<br />";
    $haserror = 0;
}

//Kontrolliere ob die Bilder JPG oder JPEG Bilder sind
if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Nur JPG oder JPEG Bilder erlaubt.<br />";
    $haserror = 0;
}

//Kontrolliere ob es ein Fehler gab
if ($haserror != 0) {
    // Falls alles funktioniert, speichere das JPG in den Ordner "Uploads"
    if (move_uploaded_file($_FILES["jpgfile"]["tmp_name"], "../uploads/" . $neuername)) {
        echo "Das JPG " . htmlspecialchars(basename($_FILES["jpgfile"]["name"])) . " wurde hochgeladen.<br />";
    } else {
        echo "Fehler, es gab ein Error.<br />";
    }
}

echo "Weiterleitung in 5 Sekunden.<br />";
header("refresh:6;url=../index.php");


//Quelle: https://www.w3schools.com/php/php_file_upload.asp