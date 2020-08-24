let text = document.getElementById('comment-area');
let btn = document.getElementById('btn-addcoment');

let listComment = document.getElementById('comments');

function addComment(){

    let item = ' <div class="comment-item">'
    + '<div class="pic">'
    + '<img src="Assets/images/users/avatar-1.jpg" >'
    
    +'</div>'
    + '<div class="comment-text">'+text.value+'</div>'
    +'</div> ';

    listComment.insertAdjacentHTML('beforeend',item);



}
btn.addEventListener('click',addComment);