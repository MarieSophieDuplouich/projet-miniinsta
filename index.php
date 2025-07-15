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
        <input type="file" name="picture" required>
        <input type="text" name="author" placeholder="votre nom" required>
        <button type="submit">Envoyer</button>
    </form>
    <hr>
    <h2>Galerie</h2>


    <?php $photos_dir = opendir("photos"); ?>
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
         $parts = explode ('-', $file_name,3); //[date, auteur, reste du nom]
        
        if (count($parts)===3){

        $timestamp = $parts[0];
        $auteur = $parts[1];
        $nom_fichier = $parts[2];
        $date = DateTime::createFromFormat('YmdHis', $timestamp);
        $date_formatee =$date ? $date ->format('d/m/Y H:i:s'): 'Date inconnue';
        // SI j'ai une date je l'affiche gentiment sinon ça affiche date inconnu ? = IF Else en plus court
        echo "<div>";
        echo "<p><strong> Auteur:</strong>".htmlspecialchars($auteur)."</p>";
        echo "<p><strong> Date :</strong>$date_formatee</p>";
        echo $file_name . "<br><img src='photos/$file_name' alt = '$nom_fichier'><br>";
        echo "</div>";
    }
        //    Il veut le format attendu 20250601144419-pierre-chat.png explode coupe ta phrase en petits morceaux


    }
    ?>


</body>

</html>
<!-- 
  echo "<pre>";
var_dump($file_names);
echo "</pre>";
$file_author= ['fichier']['author'];
-->

<!-- echo filesize("test.txt");
echo filetype("test.txt"); -->