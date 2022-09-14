<?php
  session_start();
require 'controllers/controller.php';


if (isset($_GET['action'])){
    if ($_GET['action'] == 'anim'){
        getDessins();
    }
    if ($_GET['action'] == 'dessin') {
        readDessins();
    }
    if ($_GET['action'] == 'addanim') {
        addanim();
    }
    if ($_GET['action'] == 'modifDessins') {
        updateDessins2();
    }
    if ($_GET['action'] == 'auteur') {
        getAuteur();
    }
    if($_GET['action'] == 'vueAuteur'){
        readAuteur();
    }
    if ($_GET['action'] == 'addAuteurs') {
        addAuteur();
    }
    if ($_GET['action'] == 'modifAuteurs') {
        updateAuteurs2();
    }
}else{
    home();
} 

// Update dessins
if (isset($_POST['submitDessinsmodif'])){

    if ($_FILES['imgmodif'] && $_FILES['imgmodif']['error'] == 0 && $_FILES['imgmodif']['size'] <= 1000000){
        $file = pathinfo($_FILES['imgmodif']['name']);
        $extension = $file['extension'];
        $extensionAccept = ['jpg','jpeg','png'];
    
    if (in_array($extension,$extensionAccept)){
            updateDessins();
            echo 'dessin modifié';
    }
    else{
        echo 'jpg,jpeg,png Uniquement';
    }
}else{
    echo 'Image trop lourde et/ou non envoyée </br>';
    }
}

// Delete auteur
if(isset($_POST['supdessin'])){
    $db = dbConnect();
    $sql =' DELETE FROM `dessins` WHERE `id_dessins` = :id';
    $prepare = $db->prepare($sql);
    $prepare ->execute([
        'id' => $_POST['id']
    ]);
}

// Update auteurs
if (isset($_POST['submitAuteursmodif'])){
        if ($_FILES['imgAuteurmodif'] && $_FILES['imgAuteurmodif']['error'] == 0 && $_FILES['imgAuteurmodif']['size'] <= 1000000){
        $file = pathinfo($_FILES['imgAuteurmodif']['name']);
        $extension = $file['extension'];
        $extensionAccept = ['jpg','jpeg','png'];
    
        if (in_array($extension,$extensionAccept)){
            updateAuteur();
            echo 'Auteur modifié';
        }
        else{
            echo 'jpg,jpeg,png Uniquement';
        }
        }else{
        echo 'Image trop lourde et/ou non envoyée </br>';
        }
}

// Delete auteur
if(isset($_POST['supAuteur'])){
    $db = dbConnect();
    $sql =' DELETE FROM `auteurs` WHERE `id_auteur` = :id';
    $prepare = $db->prepare($sql);
    $prepare ->execute([
        'id' => $_POST['id']
    ]);
}

//  Barre de recherche
if (isset($_GET['search'])){
    $db = dbConnect();
    $sql ='SELECT * FROM dessins WHERE dessin LIKE :dessins';
    $preparer = $db->prepare($sql);
    $preparer->execute([
        'dessins' => '%' . $_GET['search'] . '%',
    ]);
    $list = $preparer->fetchAll();
    ?>

    <div class="container justify-content-center">
        <div class="row">

    <?php
    foreach ($list as $valeur){
    ?>
        <div class="card" style='width:18rem'>
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $valeur['image'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Titre : <?php echo $valeur['dessin']; ?></h5>
                        <a href="index.php?action=dessin&id=<?php echo $valeur['id_dessins'] ?>"><button type="button" name="fiche" class="btn btn-dark">Fiche</button></a>
                    </div>
                </div>
            </div>
    <?php
    };
$db = dbConnect();
    $sql2 ='SELECT * FROM auteurs WHERE nom LIKE :nom';
    $preparer = $db->prepare($sql2);
    $preparer->execute([
        'nom' => '%' . $_GET['search'] . '%',
    ]);
    $list = $preparer->fetchAll();
    foreach ($list as $valeur){
    ?>
       <div class="card" style='width:18rem'>
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $valeur['photo'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Nom de l'auteur : <?php echo $valeur['nom']; ?></h5>
                        <a href="index.php?action=vueAuteur&id=<?php echo $valeur['id_auteur'] ?>"><button type="button" name="fiche" class="btn btn-dark">Fiche</button></a>
                    </div>
                </div>
            </div>
    <?php
    };
    ?>
        </div>
    </div>
    <?php
}?>

<?php
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }