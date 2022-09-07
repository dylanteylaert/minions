<?php
require 'controllers/controller.php';


if (isset($_GET['action'])){
    if ($_GET['action'] == 'anim'){
        readDessins();
    };
}
else{
    home();
} 