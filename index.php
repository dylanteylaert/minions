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
    
}
else{
    home();
} 