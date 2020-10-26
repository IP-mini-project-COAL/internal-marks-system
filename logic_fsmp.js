$(document).ready(function(){
    $('.menu-toggle').click(function(){

        $('nav').toggleClass('active')
    })
})
var ele =function(element){
    return document.getElementById(element);
}
let flag = 0;
let modal =ele("s-wrap");
let b = ele("menu-toggle");
b.addEventListener('click',function(){
    if(flag==0){
    modal.classList.add('active-disable');
    flag+=1;
}else if(flag==1){
    modal.classList.remove('active-disable');
    flag=0;
}

});

