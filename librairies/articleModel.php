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

function updateArticle($title,$content,$publishedDate,$user,$image,$updatedArticle){
    $db = connexion();
    $update = $db->prepare ('UPDATE articles SET title = :title, content = :content, published_date = :published_date, users_id_user = :users_id_user, image = :image WHERE id_article = :updatedarticle');
    $update->execute(array('title'=>$title, 'content'=>$content, 'published_date'=>$publishedDate, 'users_id_user'=>$user, 'image'=>$image, 'updatedarticle'=>$updatedArticle)); 

    header('Location: listArticle.php');
    exit();
}

function deleteArticle($updatedArticle){
    $db = connexion();
    $request = $db->prepare('DELETE FROM articles WHERE id_article = :id_article');
    $request->execute(array('id_article' => $updatedArticle));
}


