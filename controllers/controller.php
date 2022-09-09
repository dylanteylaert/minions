<?php

require 'models/model.php';

function home(){
    require 'view/indexView.php';
}

// Get de tous les dessins
function getDessins(){
    require 'view/getDessins.php';
}

// Create des dessins
function addanim(){
    require 'view/addDessins.php';
}

// Read des dessins
function readDessins(){
    require 'view/readDessins.php';
}

// Update des dessins
function updateDessins2(){
    require 'view/updateDessins.php';
}

// Get des auteurs
function getAuteur(){
    require 'view/getAuteur.php';
}

// Read des auteurs
function readAuteur(){
    require 'view/readAuteur.php';
}

// Create des auteurs
function addAuteur(){
    require 'view/addAuteurs.php';
}

// Update des auteurs
function updateAuteurs2(){
    require 'view/updateAuteur.php';
}