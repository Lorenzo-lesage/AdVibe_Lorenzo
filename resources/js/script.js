// NAVBAR
let navbar = document.querySelector("#navbar");
// let dropdown = document.querySelector("#dropdown-menu");
let dropdownUser = document.querySelector("#dropdown-user");
// let dropdownLanguage = document.querySelector("#dropdown-language");

window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        navbar.classList.add("nav-scrolled");
        // dropdown.classList.add("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.add("nav-scrolled");
        // if (dropdownLanguage) dropdownLanguage.classList.add("nav-scrolled");
    } else {
        navbar.classList.remove("nav-scrolled");
        // dropdown.classList.remove("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.remove("nav-scrolled");
        // if (dropdownLanguage) dropdownLanguage.classList.remove("nav-scrolled");
    }
});

// TASTO SETTINGS NAVBAR
// Seleziona il solo elemento #settings
const settingsButton = document.querySelector("#settings");
const closeButton = document.querySelector(".btn-close");

// Funzione per ruotare #settings
function rotateSettings() {
    settingsButton.classList.toggle("rotate");
}

// Aggiungi evento di click su #settings
settingsButton.addEventListener("click", rotateSettings);

// Aggiungi evento di click sul pulsante di chiusura
closeButton.addEventListener("click", rotateSettings);



