<?php
    include('../config/config.php');
    include('../librairies/db.lib.php');

    $vue = 'listUser.phtml';
    
    $db = connexion();
    $stt = $db->prepare('SELECT * FROM users');
    $stt->execute();
    $listUsers = $stt->fetchAll(PDO::FETCH_ASSOC);
       
    include('tpl/layout.phtml');

 ?>