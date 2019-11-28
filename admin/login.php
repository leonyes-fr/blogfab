<?php

include('../config/config.php');
include('../librairies/db.lib.php');
session_start();

$vue = 'tpl/login.phtml';
$email = '';

$errors = [];

try
{
    if(array_key_exists('session',$_POST)){
        $_SESSION['connected']= false;
    }

    if(array_key_exists('login',$_POST))
    {
        $errors[] = 'Erreur! Login ou mot de passe non valide.';
        $email = $_POST['login'];

        $db = connexion();
        $login = $db->prepare ('SELECT * FROM users WHERE email = :email ');
        $login->execute(array('email'=>$_POST['login']));
        $user = $login->fetch();
            
                $isPasswordCorrect = password_verify($_POST['password'], $user['password']);
                if ($isPasswordCorrect) 
                {
                    var_dump("reussis");
                    $_SESSION['connected']= true;
                    $_SESSION['user']= ['id'=>$user['id_user'],'username'=>$user['username'],'email'=>$user['email']];

                    header('Location: index.php');
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