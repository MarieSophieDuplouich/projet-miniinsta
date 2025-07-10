<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Mini Insta Upload Photos!</title>
</head>
<body>
    jcjisdjvisjfivjidfj
    <?php
$isSuccessful = false;
// Si le forumlaire à bien soumis un input nommé "picture"
if (isset($_FILES["picture"])) {
    var_dump($_FILES); // j'affiche les informations du fichier uploadé pour m'aider au débogage

    // Je récupère le chemin temporaire du fichier uploadé
    $chemin_tmp = $_FILES["picture"]["tmp_name"];

    // A l'aide du chemin temporaire, je déplace le fichier vers le dossier "photos/" avec le nom du fichier uploadé
    $isSuccessful = move_uploaded_file( $chemin_tmp, "photos/".$_FILES["picture"]["name"] );
}

?> 

<?php if($isSuccessful == true) : ?>
    <h1>Upload Success ! </h1>
<?php else :?>
    
    <h1>Upload Failed ! </h1>
<?php endif; ?>


<a href="/">Retour à la page d'accueil</a>

  <?php  $photos_dir = opendir("photos"); ?>

<?php  $photos_dir = opendir("photos");
$file_name = readdir($photos_dir); // Premier fichier
echo $file_name . "<br>";
$file_name = readdir($photos_dir); // Deuxième fichier
echo $file_name . "<br>"; ?>
</body>
</html>