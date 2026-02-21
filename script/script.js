//Açi es faran xicotetes proves per petiicons ajax i canvits de estls
function mostraMenu(){

    'use strict';
    let menu = document.getElementById("colors");
    if(menu.style.display == "none"){
        menu.style.display = "block";
    }else{
        menu.style.display = "none";
    }
  
}


//Una altra forma de mostrar o ocultar menús
window.onload = function(){
    'use strict';
    let login = document.querySelector("#enllaç");
    let div = document.querySelector("#login");
    login.addEventListener("click", () =>{

        //e.preventDefault();//per a evitar la navegavilitat del enllaç

        if(div.style.display === "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    });
};