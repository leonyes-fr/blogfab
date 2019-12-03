'use strict';

//Event sur click photo   A REVOIR ++++++++++

$(function() {
    $('.img-thumbnail').on('click', showImage);
    $('.delete').on('click',deleteArticle);
}) ;


function showImage(){
    document.querySelector('.pictureArticle').src = this.src;
    //$('.pictureArticle').attr('src', $(this).attr('src'));  Version jquery...
    $('#picture').modal('show'); // Puis on affiche la modal.
}

function deleteArticle(e){
    e.preventDefault();
    document.querySelector('.confirmDelete').href = this.href;
    $('#deleteModal').modal('show'); // Puis on affiche la modal.
    
}
