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

// Get des dessins
function afficheDessins(){
    
    $db = dbConnect();
    $sql = 'SELECT * FROM dessins';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}

// Read des dessins
function lireDessins(){
    $db = dbConnect();
    $readId = $db->prepare('SELECT * FROM dessins WHERE id_dessins = :id');
    $readId->execute(
    [
        'id' => $_GET['id']
    ]);
    $list = $readId->fetchall();
    return $list;
}

// Create des dessins
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
    }echo    '  <div class="alert alert-success text-center" role="alert">
    Les données ont bien été sauvegardées
</div>'     ;
}

// Update des dessins
function updateDessins(){
    $db = dbconnect();
    $sql = ('UPDATE dessins SET `dessin`=:dessin , `description`=:description , `image`=:image WHERE id_dessins= :id'); 
    $prepare = $db->prepare($sql);
    $prepare->execute(
        [
            'dessin' => $_POST['dessinmodif'],
            'description' => $_POST['descriptionmodif'],
            'image' => 'public/imgs/dessins/' . $_FILES['imgmodif']['name'],
            'id' => $_POST['id']
        ]
    );
    $fileName = 'public/imgs/dessins/' . basename($_FILES['imgmodif']['name']);
    move_uploaded_file($_FILES['imgmodif']['tmp_name'], $fileName);
    echo    '  <div class="alert alert-success text-center" role="alert">
    Les données ont bien été modifier
</div>'     ;
}

// Get des auteurs
function viewAuteur(){
    $db = dbConnect();
    $sql = 'SELECT * FROM auteurs';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}

// Read des auteurs
function lireAuteur(){
    $db = dbConnect();
    $readId = $db->prepare('SELECT * FROM auteurs WHERE id_auteur = :id');
    $readId->execute(
    [
        'id' => $_GET['id']
    ]);
    $list = $readId->fetchall();
    return $list;
}

// Create des auteurs
if (isset($_POST['submitAuteurs'])){
    $db = dbConnect();
    $sql ='INSERT INTO `auteurs`(`nom`, `style`, `photo`) VALUES (:nom,:style,:photo)';
    $preparer = $db->prepare($sql);
    $preparer->execute(
    [
        'nom' => $_POST['auteur'],
        'style' => $_POST['style'],
        'photo' => 'public/imgs/auteurs/' . $_FILES["imgauteur"]["name"]
    ]
    );
    $target_dir = "public/imgs/auteurs/";//lieu où sont enregistré les image 
    $target_file = $target_dir . basename($_FILES["imgauteur"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Vérification si le fichier est une image
    if(isset($_POST["submitAuteurs"])) {
    $check = getimagesize($_FILES["imgauteur"]["tmp_name"]);
    
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
    }


    // Vérification de la taille du fichier
    if ($_FILES["imgauteur"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["imgauteur"]["tmp_name"], $target_file)) {
        echo print_r($target_file);
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["imgauteur"]["name"])). " a été envoyé.";
    } else {
        echo " Erreur lors de l'envoi du fichier";
    }
    } echo    '  <div class="alert alert-success text-center" role="alert">
    Les données ont bien été sauvegardées
</div>'     ;
}

// Update des auteurs
function updateAuteur(){
    $db = dbconnect();
    $sql = ('UPDATE auteurs SET `nom`=:nom , `style`=:style , `photo`=:photo WHERE id_auteur= :id'); 
    $prepare = $db->prepare($sql);
    $prepare->execute(
        [
            'nom' => $_POST['auteurmodif'],
            'style' => $_POST['stylemodif'],
            'photo' => 'public/imgs/auteurs/' . $_FILES['imgAuteurmodif']['name'],
            'id' => $_POST['id']
        ]
    );
    $fileName = 'public/imgs/auteurs/' . basename($_FILES['imgAuteurmodif']['name']);
    move_uploaded_file($_FILES['imgAuteurmodif']['tmp_name'], $fileName);
    echo    '  <div class="alert alert-success text-center" role="alert">
    Les données ont bien été modifier
</div>'     ;
}

function user(){
    $db = dbConnect();
    $readId = $db->prepare('SELECT * FROM users where `admin` = TRUE');
    $readId->execute([]);
    $list2 = $readId->fetchall();
    return $list2;
}