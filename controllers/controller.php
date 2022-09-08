<?php

require 'models/model.php';

// Read de tous les dessins
function getDessins(){
    require 'view/getDessins.php';
}

function home(){
    require 'view/indexView.php';
}

// Create dessins
function addanim(){
    require 'view/addDessins.php';
}

function readDessins(){
    require 'view/readDessins.php';
}

function updateDessins2(){
    require 'view/updateDessins.php';
}

// Read auteurs

function getAuteur(){
    require 'view/getAuteur.php';
}
function readAuteur(){
    require 'view/readAuteur.php';
}
