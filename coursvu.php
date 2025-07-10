<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Je peux aussi lancer un serveur php en watchmode pour rafrachir la page à chaque ctrl+S
php -S localhost:8000 -t . --watch -->

ffff

<?php 
echo "Hello World !";
?>

<p>Bonjour, voici un paragraphe en HTML !</p>
<?php
$dice = rand(1,6); // Génère un nombre aléatoire entre 1 et 6
?>

<p>Bonjour, voici un D<?php echo $dice; ?> !</p>

<?php
$notes = [12, 15, 8, 20, 10];
?>
<p>Voici les notes :</p>
<?php foreach ($notes as $note): ?>
    <p>Note : <?= $note; ?></p>
<?php endforeach; ?> 
<?php
$lines = [];
$fichier = fopen("fichier.txt", "r");
if($fichier){

    while (($line = fgets($fichier)) !== false) {
        $lines[] = $line;
    }
    fclose($fichier);
}
?>


<h2>Contenu du fichier :</h2>
<?php foreach ($lines as $line): ?>
    <p><?= $line; ?></p>
<?php endforeach; ?>
<?php
$age = 18;
if ($age >= 18): ?>
    <p>Vous êtes majeur.</p>
<?php else: ?>
    <p>Vous êtes mineur.</p>
<?php endif; ?>

<!-- <form action="/add-user.php" method="post">
  <input type="text" name="name">
  <input type="email" name="email">
  <input type="password" name="password">

  <input type="submit" value="Submit">
</form> 

<h2> Bonjour <?= $_POST["name"] ?> !</h2>
echo $_POST["email"];
echo $_POST["password"];

<?php
// if (!isset($_POST["name"]) || empty($_POST["name"])) {
//     header("Location: /mising-name.php");
//     exit();
// }?> -->

<form action="/upload.php" method="post" enctype="multipart/form-data">
  <input type="text" name="author" placeholder="Auteur">
  <input type="file" name="photo" accept="image/*">
  <input type="submit" value="Envoyer">
</form>
<?php
if (isset($_FILES['photo'])) {
    $author = $_POST['author'];
    $file = $_FILES['photo'];
    var_dump($file); // Affiche les informations du fichier uploadé
    var_dump($author); // Affiche l'auteur
}?>
</body>
</html>