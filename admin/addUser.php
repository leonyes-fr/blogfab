<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');

userIsLogged('ROLE_ADMIN');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue intégrer au layout. */
$vue = 'addUser.phtml';
$title = 'Ajout d\'un utilisateur';
$username = '';  /*Servira dans la vue, vide au départ, prendra la value username dans le formulaire. */
$email = '';

$errors = [];

try
{
    if(array_key_exists('username',$_POST))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];

        if($_POST['password'] != $_POST['controlPassword']){
            $errors[] = 'Erreur! les champs mot de passe ne sont pas identiques !';
        }

        if(count($errors) == 0)
        {
            $uploads_dir = UPLOAD_DIR.'avatars';
            $tmp_name = $_FILES['userfile']['tmp_name'];
            $image = $_FILES['userfile']['name'];
            $avatar = uniqid().$image;
            move_uploaded_file($tmp_name, $uploads_dir.'/'.$avatar);


            /*Va persister un nouveau utilisateur dans la bdd. */
            $username= $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $role = $_POST['role'];
            $created_date = date('Y-m-d');
            addUser($username, $password, $email, $avatar, $role, $created_date);
        }
           
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');

?>
