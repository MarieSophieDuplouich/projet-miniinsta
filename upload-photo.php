    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload</title>
        <link rel="stylesheet" href="assets/upload.css">
    </head>

    <body>
        <?php
        $isSuccessful = false;
        // Si le forumlaire à bien soumis un input nommé "picture"
        if (isset($_FILES["picture"]["tmp_name"]) && isset($_POST["author"])) {
            var_dump($_FILES); // j'affiche les informations du fichier uploadé pour m'aider au débogage
            $author = $_POST["author"];
            // Je récupère le chemin temporaire du fichier uploadé
            $chemin_tmp = $_FILES["picture"]["tmp_name"];
            $originalName = $_FILES["picture"]["name"];
            $timestamp = date("YmdHis");

            $newfileName =  $timestamp . '-' . $author . '-' . $originalName;

            // A l'aide du chemin temporaire, je déplace le fichier vers le dossier "photos/" avec le nom du fichier uploadé
            $isSuccessful = move_uploaded_file($chemin_tmp, "photos/" .  $newfileName);


            echo "<div>";
            echo $newfileName  . "<br><img src='photos/$newfileName ' alt = ' $newfileName'><br>";
            echo "<p><strong> Auteur:</strong>" . htmlspecialchars($author) . "</p>";
            echo "<p><strong> Date :</strong> $timestamp</p>";
            echo "</div>";
        }

        ?>

        <?php if ($isSuccessful == true) : ?>
            <h1>Upload Réussi ! </h1>
        <?php else : ?>

            <h1>Upload échoué ! </h1>
        <?php endif; ?>


        <a href="/">Retour à la page d'accueil</a>

        <?php $photos_dir = opendir("photos"); ?>

        <?php $photos_dir = opendir("photos");
        $file_name = readdir($photos_dir); // Premier fichier
        echo $file_name . "test<br>";
        $file_name = readdir($photos_dir); // Deuxième fichier
        echo $file_name . "test<br>"; ?>


        <!-- écrire ici post et voir page 158 lire cours la lecture du dossier -->

        <!-- $_FILES ["picture"]["tmp_name"]
$_FILES ["picture"]["type"]
$_FILES ["picture"]["size"]
$_FILES ["picture"]["author"]
$_FILES ["picture"]["date"] -->
    </body>

    </html>