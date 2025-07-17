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



$liste_src = lire_dossier();
//attention ici il faut regarder
$fichiers = [];

foreach ($liste_src as $file_name) {
    $fichier = [];
    $parts = explode('-', $file_name, 3); //[date, auteur, reste du nom]

    if (count($parts) === 3) {

        $fichier["timestamp"] = $parts[0];
        $fichier["auteur"] = $parts[1];
        $fichier["name"] = $parts[2];
        $fichier["date"] = DateTime::createFromFormat('YmdHis',  $fichier['timestamp']);
        $fichier ["date_formatee"]= $fichier["date"] ? $fichier["date"] ->format('d/m/Y H:i:s') : 'Date inconnue';
        $fichier["image"] = $file_name;

        $fichiers[] = $fichier;
    }
    //    Il veut le format attendu 20250601144419-pierre-chat.png explode coupe ta phrase en petits morceaux


}


// poser question massi Je veux des extraits jumpsscare que je vais appeler ghost
//je vais faire untableau aevc les liens urls html des extraits de jumpsscare de I'm not a human
//bref en php//Dès que l'utilisateur entre dans ma page web le fantôme apparaît quelques secondes et après il disparaît
//Tant que utilisateur ne rentre pas dans mon site web, le fantôme n'apparaît pas
//sinon il apparaît//


// $ghosts = ['https://www.youtube.com/embed/VejFr5tkSgU?start=606&end=609&autoplay=1&mute=1&controls=0&modestbranding=1&rel=0',

//     'https://www.youtube.com/embed/DEZWY-BWskY?start=250&end=251&autoplay=1&mute=1&controls=0&modestbranding=1&rel=0'
//     ];

// $user = "comment le définir ici?";

// function Jumpscare{

// if (isset($user => click on index.php)) {

//    echo  "$user see".rand($ghosts). " during 5 secondes";
//     # code...
// }

// else {
//    echo "$ghosts n'apparaît pas";
// }

// }

// Jumpscare();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Insta</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>


<iframe src="" frameborder="0"></iframe>
    <!-- mettre le label pour l'input -->
    <h1>Mini Insta</h1>
    <h2>Ajoutez une photo !</h2>
    <form action="upload-photo.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture" placeholder="Parcourir ..." required>
        <input type="text" name="author" placeholder="votre nom" required>
        <div class="container">
            <div class="btn"><button type="submit">Envoyer</button></div>
        </div>
    </form>
    <h2>Galerie I'm not a Human</h2>
    <?php foreach ($fichiers as $fichier): ?>
            <div class="container-image">
                <img src="photos/<?= htmlspecialchars($fichier["image"]) ?>" alt='<?= htmlspecialchars($fichier["name"]) ?>'>
                <p><strong> Titre :<?= htmlspecialchars($fichier["name"]) ?> </strong></p>
                <p><strong> Auteur : </strong> <?= htmlspecialchars($fichier["auteur"]) ?></p>
                <p><strong> Date : </strong><?=  $fichier ["date_formatee"]?></p>
            </div>

        </div>
    <?php endforeach; ?>
    <footer>
        <nav>
            <ul>
                <li><a href="index.php"><img src="./assets/Accueil.svg" alt="Accueil"></a></li>
                <li><a href="news.asp"><img src="./assets/Ajouter.svg" alt="Ajouter"></a></li>
                <li><a href="contact.asp"><img src="./assets/Envoyer.svg" alt="Envoyer"></a></li>
            </ul>
        </nav>
        <audio src=""></audio>
    </footer>


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

