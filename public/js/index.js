// pick up of element and adding up on my classes

let inputNom= document.querySelector('.name #name');
let inputPassword=document.querySelector('.password #password');
let labelnom=document.querySelector('.lb-name');
let labelpassword=document.querySelector('.lb-password');
let upnom=false;
let upPassword=false;

inputNom.addEventListener('focus',()=> {
   if (!upnom) {
    labelnom.classList.add('lb-up')
    upnom=true;
   }else{
    labelnom.classList.remove('lb-up');
    upnom=false;
   }
},false);

inputPassword.addEventListener('focus',()=> {
    if (!upPassword) {
        labelpassword.classList.add('ps-up');
        upPassword=true;
    }else{
        labelpassword.classList.remove('ps-up');
        upPassword=false;
    }
 },false);
