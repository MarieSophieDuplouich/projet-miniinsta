<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Insta</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<h1>Mini Insta</h1>
<h2>Ajoutez une photo !</h2>
    <form action="upload-photo.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture">
        <button>Envoyer</button>
    </form> 

  <?php  $photos_dir = opendir("photos"); ?> 
<?php
  function lire_dossier()
{
    $file_names = [];
    try {
        $photos_dir = opendir("photos");

        do {
            $file_name = readdir($photos_dir);
            // Je n'affiche pas les fichiers cachés (commençant par un point) et les répertoires spéciaux "." et ".."
            if ($file_name && $file_name != "." && $file_name != ".." && $file_name != "/") {
                $file_names[] = $file_name; // J'ajoute le nom du fichier à la liste
            }
        } while ($file_name);
    } catch (\Throwable $th) {
        throw $th;
    }
    return $file_names;
}

$liste_des_fichiers = lire_dossier();
foreach ($liste_des_fichiers as $file_name) {
    echo $file_name . "<br>";
}
?>


</body>

</html>