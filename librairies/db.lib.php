<?php


function connexion()
{
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    return $db;
}