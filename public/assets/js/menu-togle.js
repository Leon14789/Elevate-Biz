
/* 
   Dentro deste codigo tenho uma função auto invocada (pois nao tem necessidade de ser uma
      codigo compartilhado ) 
      * E dentro desta constante eu pego a classe menu, quando tiver um click, dentro do 
      * body ele irá alternar entre colocar a classe hide-sidebar que faz com que o 
      * menu lateral aparece ou desapareca
*/

(function (){
   const menuTogle = document.querySelector('.menu')
   menuTogle.onclick = function (e) {
     const body = document.querySelector('body')
    
     body.classList.toggle('hide-sidebar')
   }
})()


