<?php

function addArticle($title,$content,$publishedDate,$user,$image){
    
    $db = connexion();
    $insert = $db->prepare ('INSERT INTO articles(title, content, published_date, users_id_user, image) VALUES(:title, :content, :published_date, :users_id_user, :image)');
    $insert->execute(array('title'=>$title, 'content'=>$content, 'published_date'=>$publishedDate, 'users_id_user'=>$user, 'image'=>$image)); 

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