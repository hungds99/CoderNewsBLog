let text = document.getElementById('comment-area');
let btn = document.getElementById('btn-addcoment');
let name = document.getElementById('cmt_name');
let email = document.getElementById('cmt_email');
let listComment = document.getElementById('comments');  

function addComment(){

    let item = ' <div class="comment-item">'
    + '<div class="pic">'
    + '<img src="Assets/images/users/avatar-1.jpg" >'
    
    +'</div>'
    + '<div class="comment-text">'
    +'<h4> <Strong>'+name.value+'</Strong> </h4>'
    +'<p>'+text.value+'</p>'
    +'</div>'
    +'</div> ';

    listComment.insertAdjacentHTML('beforeend',item);



}
btn.addEventListener('click',addComment);