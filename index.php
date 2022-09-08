<?php
require 'controllers/controller.php';


if (isset($_GET['action'])){
    if ($_GET['action'] == 'anim'){
        getDessins();
    }
    if ($_GET['action'] == 'addanim') {
        addanim();
    }
    if ($_GET['action'] == 'dessin') {
        readDessins();
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
    
}





elseif (isset($_POST['submitDessinsmodif'])){

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

else{
    home();
} 