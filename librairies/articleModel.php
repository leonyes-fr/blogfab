<?php

function addArticle(){
    
    $db = connexion();
    $publishedDate = date('Y-m-d');
    $insert = $db->prepare ('INSERT INTO articles(title, content, published_date, users_id_user) VALUES(:title, :content, :published_date, :users_id_user)');
    $insert->execute(array('title'=>$_POST['title'], 'content'=>$_POST['content'], 'published_date'=>$publishedDate, 'users_id_user'=>$_SESSION['user']['id'])); 

    header('Location: listArticle.php');
    exit();
}


function listArticle(){
    $db = connexion();
    $stt = $db->prepare ('SELECT * FROM articles a INNER JOIN users u ON (a.users_id_user = u.id_user)');
    $stt->execute(); 
    $listArticle =$stt->fetchAll(PDO::FETCH_ASSOC);
    return $listArticle;

}