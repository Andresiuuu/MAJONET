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

if (switchTheme) {
    switchTheme.addEventListener("change", () => {
        if (switchTheme.checked) {
            document.body.style.backgroundColor = "#111";
        } else {
            document.body.style.backgroundColor = "#fff";
        }
    });
}
// Ocultar navbar al hacer scroll
const header = document.querySelector("header");
if (header) {
    let lastScroll = 0;
    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll > lastScroll && currentScroll > 70) {
            header.classList.add("hidden");
        } else {
            header.classList.remove("hidden");
        }
        lastScroll = currentScroll;
    });
}

// Sidebar
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");

if (menuBtn && sidebar && overlay) {
    menuBtn.addEventListener("click", () => {
        sidebar.classList.add("active");
        overlay.classList.add("active");
    });

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }

    overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });
}