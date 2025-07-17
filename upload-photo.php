
 <?php
        $isSuccessful = false;
        // Si le forumlaire à bien soumis un input nommé "picture"
        if (isset($_FILES["picture"]["tmp_name"]) && isset($_POST["author"])) {
            // var_dump($_FILES); // j'affiche les informations du fichier uploadé pour m'aider au débogage
            $author = $_POST["author"];
            // Je récupère le chemin temporaire du fichier uploadé
            $chemin_tmp = $_FILES["picture"]["tmp_name"];
            $originalName = $_FILES["picture"]["name"];
            $timestamp = date("YmdHis");

            $newfileName =  $timestamp . '-' . $author . '-' . $originalName;

            // A l'aide du chemin temporaire, je déplace le fichier vers le dossier "photos/" avec le nom du fichier uploadé
            $isSuccessful = move_uploaded_file($chemin_tmp, "photos/" .  $newfileName);
 
        }

        ?>

       <?php if ($isSuccessful == true) : ?>
           <h1>Upload Réussi ! </h1>
       <?php else : ?>

           <h1>Upload échoué ! </h1>
       <?php endif; ?>


       <div class="container">
           <div class="btn"><a href="/">Accueil</a></div>
       </div>


       <?php $photos_dir = opendir("photos"); ?>

       <?php $photos_dir = opendir("photos");
        $file_name = readdir($photos_dir); // Premier fichier
        echo $file_name;
        $file_name = readdir($photos_dir); // Deuxième fichier
        echo $file_name; ?>


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
            echo "<div>";
            echo "<img src='photos/$newfileName ' alt = ' $newfileName'><br>";
            echo "<p><strong> Auteur:</strong>" . htmlspecialchars($author) . "</p>";
            echo "<p><strong> Date :</strong> $timestamp</p>";
            echo "</div>"; 
            ?>


 <footer>
        <nav>
            <ul>
                <li><a href="index.php"><img src="./assets/Accueil.svg" alt="Accueil"></a></li>
                <li><a href="news.asp"><img src="./assets/Ajouter.svg" alt="Ajouter"></a></li>
                <li><a href="contact.asp"><img src="./assets/Envoyer.svg" alt="Envoyer"></a></li>
            </ul>
        </nav>
    </footer>
   </body>

   </html>