<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
userIsLogged('ROLE_ADMIN');



$vue = 'addUser.phtml';
$title = 'Ajout d\'un utilisateur';
$username = '';
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
            $db = connexion();
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $created_date = date('Y-m-d');
            $insert = $db->prepare ('INSERT INTO users(username,password,email,avatar,role, created_date) VALUES(:username,:password,:email,:avatar,:role, :created_date) ');
            $insert->execute(array('username'=>$_POST['username'], 'password'=>$passHash,'email'=>$_POST['email'],'avatar'=>$_POST['avatar'],'role'=>$_POST['role'], 'created_date'=>$created_date)); 

            header('Location: listUser.php');
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
