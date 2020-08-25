let navbar_main = document.getElementById('navbar-main');
    window.onscroll = function(){
        if (this.scrollY > 200){

            navbar_main.classList.add('fix');
        }else {
            navbar_main.classList.remove('fix');
        }
}