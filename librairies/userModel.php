<?php

function listUsers(){
    $db = connexion();
    $stt = $db->prepare('SELECT * FROM users');
    $stt->execute();
    $listUsers = $stt->fetchAll(PDO::FETCH_ASSOC);
    return $listUsers;
}

function addUser(){
    $db = connexion();
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $created_date = date('Y-m-d');
            $insert = $db->prepare ('INSERT INTO users(username,password,email,avatar,role, created_date) VALUES(:username,:password,:email,:avatar,:role, :created_date) ');
            $insert->execute(array('username'=>$_POST['username'], 'password'=>$passHash,'email'=>$_POST['email'],'avatar'=>$_POST['avatar'],'role'=>$_POST['role'], 'created_date'=>$created_date)); 

            header('Location: listUser.php');
            exit();
}


function userIsLogged($role='ROLE_AUTHOR'){ /*Prend $role='ROLE_AUTHOR par défaut si aucun parametres n'est fournis a l'appel de la fonction. */

    if(!isset($_SESSION['connected']) || $_SESSION['connected'] != true){
       header('Location:login.php');
        exit();
    }  
    if($_SESSION['user']['role'] != 'ROLE_ADMIN' && $_SESSION['user']['role']!= $role){
        header('Location:index.php');
        exit();
    }
}