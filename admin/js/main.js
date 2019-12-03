'use strict';

//Event sur click photo   A REVOIR ++++++++++
$('.img-thumbnail').on('click', showImage);

function showImage(){
    document.querySelector('.pictureArticle').src = this.src;
    //$('.pictureArticle').attr('src', $(this).attr('src'));  Version jquery...
    $('#picture').modal('show'); // Puis on affiche la modal.
}