<!DOCTYPE html>
<html lang="de">

<head>
    <title>Eriks PHP-Projekt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Website Cover -->
    <blockquote class="blockquote text-center">
        <h1 class="display-1">Website Cover</h1>
        <h1 class="display-3">Aufgabe 2</h1>
    </blockquote>

    <img src="php/task1.php" class="img-thumbnail">


    <!-- Neuer Abschnitt -->
    <hr class="mt-2 mb-5">
    <!-- Neuer Abschnitt -->



    <!-- GIF-->
    <div class="container">
        <blockquote class="blockquote text-center">
            <h1 class="display-1">Mein eigenes Gif</h1>
            <h1 class="display-3">Aufgabe 3</h1>
        </blockquote>

        <div class="d-flex align-items-center justify-content-center">
            <img src='index_image.gif' class="img-fluid" alt="Responsive image" />
        </div>
    </div>



    <!-- Neuer Abschnitt -->
    <hr class="mt-2 mb-5">
    <!-- Neuer Abschnitt -->



    <!--Video -->
    <div class="container">
        <blockquote class="blockquote text-center">
            <h1 class="display-1">Das Tutorial Video</h1>
            <h1 class="display-3">Aufgabe 6</h1>
        </blockquote>
        <div class="d-flex align-items-center justify-content-center">
            <video width="93%" controls>
                <source src="index_video.mp4" type="video/mp4">
                Dein Browser unterstützt keine HTML MP4 Videos.
            </video>
        </div>
    </div>



    <!-- Neuer Abschnitt -->
    <hr class="mt-2 mb-5">
    <!-- Neuer Abschnitt -->



    <!-- Upload & Galerie -->
    <blockquote class="blockquote text-center">
        <h1 class="display-1">Galerie</h1>
        <h1 class="display-3">Aufgabe 4 & 5</h1>
    </blockquote>

    <div class="container">
        <form action="php/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="jpgfile" accept="image/jpeg" />
            <input class="btn btn-success" type="submit" value="Bild Hochladen" name="submit">
        </form>
    </div>

    <div class="w-100 p-3">
        <div class="row text-center text-lg-left">
            <?php
            include 'php/resize.php';
            ?>
        </div>
    </div>

</body>

</html>