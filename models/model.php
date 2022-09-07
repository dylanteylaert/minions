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


function getDessins(){
    
    $db = dbConnect();
    $sql = 'SELECT * FROM dessins';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}