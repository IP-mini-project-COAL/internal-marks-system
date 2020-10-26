$(document).ready(function(){
    $('.menu-toggle').click(function(){

        $('nav').toggleClass('active')
    })
})
let flag = 0;
let modal =document.getElementById("content");
let b = document.getElementById("menu-toggle");
b.addEventListener('click',function(){
    if(flag==0){
    modal.classList.add('active-disable');
    flag+=1;
}else if(flag==1){
    modal.classList.remove('active-disable');
    flag=0;
}

});