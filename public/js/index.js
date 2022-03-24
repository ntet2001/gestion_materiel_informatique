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
 
 inputPassword.addEventListener('input',function (e) {
    if (e.target.value.length==8) {
        verificationmdp.className='alert alert-success';
        verificationmdp.textContent='Password is OK';
    }else{
        verificationmdp.className='alert alert-warning';
        verificationmdp.textContent='08 characters are Required for the password';
    }
},false);