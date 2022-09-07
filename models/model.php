<?php

function dbConnect(){

    try{
        $db = new PDO(
            'mysql:host=localhost;dbname=minions;charset=UTF8',
            'root',
            ''
        );
        return $db;
    }
    catch(Exception $e){
        die ("Error: " . $e->getMessage());   
    }
}

// read dessins
function getDessins(){
    
    $db = dbConnect();
    $sql = 'SELECT * FROM dessins';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}

//create dessins
if (isset($_POST['submitDessins'])){
    $db = dbConnect();
    $sql ='INSERT INTO `dessins`(`dessin`, `description`, `image`) VALUES (:dessin,:description,:img)';
    $preparer = $db->prepare($sql);
    $preparer->execute(
    [
        'dessin' => $_POST['dessin'],
        'description' => $_POST['description'],
        'img' => 'public/imgs/dessins/' . $_FILES["img"]["name"]
    ]
    );
    $target_dir = "public/imgs/dessins/";//lieu où sont enregistré les image 
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Vérification si le fichier est une image
    if(isset($_POST["submitDessins"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
    }

    // vérification si le fichier existe déjà
    if (file_exists($target_file)) {
    echo "Le fichier existe déjà.";
    $uploadOk = 0;
    }

    // Vérification de la taille du fichier
    if ($_FILES["img"]["size"] > 500000) {
    echo "La taille du fichier est trop importante.";
    $uploadOk = 0;
    }

    // Autorisation seulement de certain format de fichier
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
    $uploadOk = 0;
    }

    // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
    if ($uploadOk == 0) {
    echo " Le fichier n'a pas été envoyé.";
    // Si tout est ok, alors le fichier est uploadé dans le bon dossier
    } else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo print_r($target_file);
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["img"]["name"])). " a été envoyé.";
    } else {
        echo " Erreur lors de l'envoi du fichier";
    }
    }
};