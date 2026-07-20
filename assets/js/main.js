const accordion = document.querySelectorAll(".accordion");

accordion.forEach(item => {

item.addEventListener("click",()=>{

const panel = item.nextElementSibling;

if(panel.style.display=="block"){

panel.style.display="none";

}else{

panel.style.display="block";

}

});

});
//Script para el switch
const switchTheme = document.getElementById("themeSwitch");

switchTheme.addEventListener("change", () => {
    if (switchTheme.checked) {
        document.body.style.backgroundColor = "#111";
    } else {
        document.body.style.backgroundColor = "#fff";
    }
});
console.log("main.js cargado");