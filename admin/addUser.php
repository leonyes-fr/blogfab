<?php

include('../config/config.php');
include('../librairies/db.lib.php');

$vue = 'addUser.phtml';

$username = '';
$email = '';

$error = [];

try
{
    if(array_key_exists('username',$_POST))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];

        if($_POST['password'] != $_POST['controlPassword']){
            $error[] = 'Erreur! les champs mot de passe ne sont pas identiques !';
        }
        

        if(count($error) == 0)
        {
            $db = connexion();
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insert = $db->prepare ('INSERT INTO users(username,password,email,avatar) VALUES(:username,:password,:email,:avatar) ');
            $insert->execute(array('username'=>$_POST['username'], 'password'=>$passHash,'email'=>$_POST['email'],'avatar'=>$_POST['avatar'])); 

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
