<?php
    include('../config/config.php');
    include('../librairies/db.lib.php');
    
    $vue = 'addUser.phtml';

    /* c est la que on met le if key exist. si POST existe on lance la vérif et la persistance des données, puis finalement la listuser.phtml. */
   
    if(array_key_exists('username',$_GET))
    {
        echo "PROUT";

        try
        {
            $db = connexion();
            $insert = $db->prepare ('INSERT INTO users(username,password,email) VALUES(?,?,?) ');
            $insert->execute(array($_GET['username'], $_GET['password'], $_GET['email'])); 


           /*EXEMPLE $sth = $db->prepare('SELECT count(orderNumber) as nbOrders FROM '.DB_PREFIXE.'orders');
            $sth->execute();
            $nbOrders = $sth->fetch(PDO::FETCH_ASSOC);*/
        
        }
        catch (PDOException $e)
        {
            $vue = 'erreur.phtml';
            $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
        }
    }

    include('tpl/layout.phtml');
 

 ?>
