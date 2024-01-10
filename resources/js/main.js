// let chiocciola = document.querySelector('#imgSide');
// let btnSubmit = document.querySelector('#btnSubmit');

// btnSubmit.addEventListener('click', ()=>{
//     chiocciola.classList.add('imgSide');
// })

//*Richiamo body
let body = document.querySelector("body");
//*Richiamo loader wrapper
let loader = document.querySelector(".loader-wrapper");

//*Preloader
window.addEventListener("load",()=>{
  body.classList.remove("preload");
  loader.classList.add("d-none");
});