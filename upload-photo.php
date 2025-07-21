<?php

$fichiers = [];
$isSuccessful = false;
// Si le forumlaire à bien soumis un input nommé "picture"
if (isset($_FILES["picture"]["tmp_name"]) && isset($_POST["author"])) {

    $fichier = [];
    $fichier["author"] = $_POST["author"];
    // Je récupère le chemin temporaire du fichier uploadé
    $fichier["chemin_tmp"] = $_FILES["picture"]["tmp_name"];
    $fichier["originalName"]  = $_FILES["picture"]["name"];
    $fichier["timestamp"] = date("YmdHis");

    $fichier["newfilename"] = $fichier["timestamp"] . '-' . $fichier["author"] . '-' . $fichier["originalName"];

    // A l'aide du chemin temporaire, je déplace le fichier vers le dossier "photos/" avec le nom du fichier uploadé
    $isSuccessful = move_uploaded_file($fichier["chemin_tmp"], "photos/" .  $fichier["newfilename"]);
    if ($isSuccessful) {
        $fichiers[] = $fichier;
    }
}



?>

<?php if ($isSuccessful == true) : ?>
    <h1>Upload Réussi ! </h1>
<?php else : ?>

    <h1>Upload échoué ! </h1>
<?php endif; ?>


<!-- ici je lis ajoute ma photo dans la partie mobile -->

<?php $photos_dir = opendir("photos"); ?>
<?php
function boutonsmobilesfonctionnels()
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
$liste_fichiers = boutonsmobilesfonctionnels();

?>
<!-- ici je lis ajoute ma photo dans la partie mobile fin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="assets/upload.css">
    <script src="assets/script-cacherpub.js"></script>

</head>

<body>
    <div class="container-pub" id="container-pub">
        <img id="pub" class="pub" src="assets/pub-imnotahuman-check.webp " alt="pub imnotahuman check" hidden>
        <div class="container-pubdoor" id="container-pubdoor"> <img class="pubdoor" id="pubdoor" src="assets/pubstatique-NOimnotahuman.webp " alt="pub imnotahuman">
        </div>
    </div>

    <div class="container">
        <div class="btn"><a href="/">Accueil</a></div>
    </div>
    <?php foreach ($fichiers as $fichier): ?>
        <!-- ce que je veux -->
        <div class="container-image">
            <img src="photos/<?= htmlspecialchars($fichier["newfilename"]) ?>" alt='<?= htmlspecialchars($fichier["newfilename"]) ?>'>
            <p><strong> Auteur : </strong> <?= htmlspecialchars($fichier["author"]) ?></p>
            <p><strong> Date : </strong><?= $fichier["timestamp"] ?></p>
        </div>
    <?php endforeach; ?>

    <footer>
        <nav>
            <ul>

                <li>
                    <form class="footer" action="upload-photo.php" method="post" enctype="multipart/form-data">
                <li><a href="index.php"><img class="icon" src="./assets/Accueil.svg" alt="Accueil"></a></li>
                <label class="label-footer" type="file" for="footer-upload" style="cursor:pointer;">
                    <img class="icon" src="./assets/Ajouter.svg" alt="Ajouter">
                </label>
                <input id="footer-upload" type="file" name="picture" style="display:none;" onchange="this.form.submit();">


                <!-- <label id="author" class="parcours" for="author"></label> -->
                <input id="author" type="text" name="author" placeholder="votre nom" required hidden>

                <button type="submit" value="Submit" style="background:none;border:none;cursor:pointer;"><img class="icon" src="./assets/Envoyer.svg" alt="Envoyer"></button>
                </form>
                </li>
            </ul>
        </nav>
    </footer>

</body>

</html>