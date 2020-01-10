<?php
$target_dir = "galerija/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    header("Location: administracija.php?poruka=Slika vec postoji");
    exit();
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location: about.php");
} else {
    header("Location: administracija.php?poruka=Doslo je do greske");
}

?>