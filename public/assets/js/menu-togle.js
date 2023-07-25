
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



function activateClock() {
   const activeClock = document.querySelector('[active-clock]')
   if (!activeClock) return

   /*
      Nesta funcao nos criamos uma constate date e dps
      criamos 3 date.set passando no ultima +1 ou seja mais um segundo 
      que ira fazer toda essa logica rodar 

      apos isso nos passamos o valor que ele encontrou no HTML para um padStart que basicamente 
      diz que sempre irá retonrar algo e nesse retorno quero que tenha duas casas e 0 do lado esquerdo  
      
   */

function addOneSecond(hours, minutes, seconds) {
   const date = new Date();
   date.setHours(parseInt(hours))
   date.setMinutes(parseInt(minutes))
   date.setSeconds(parseInt(seconds) + 1)

   const h = `${date.getHours()}`.padStart(2, 0);
   const m = `${date.getMinutes()}`.padStart(2, 0);
   const s = `${date.getSeconds()}`.padStart(2, 0);

   return `${h}:${m}:${s}`;

}


  setInterval(function(){ 

   // Horario 07:10:50 -> ['07', '10', '50']

      const parts = activeClock.innerHTML.split(':');
      
      activeClock.innerHTML = addOneSecond(parts[0], parts[1], parts[2],)
  }, 1000)
}

activateClock()


