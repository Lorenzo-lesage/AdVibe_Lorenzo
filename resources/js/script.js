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
const settingsButton = document.querySelector("#settings");
const closeButton = document.querySelector(".btn-close");
const menu = document.querySelector("#navbarNav"); // Offcanvas menu

// Funzione per ruotare #settings
function rotateSettings() {
    settingsButton.classList.toggle("rotate");
}

// Aggiungi evento di click su #settings
settingsButton.addEventListener("click", (e) => {
    e.stopPropagation(); // Impedisce la propagazione al body
    rotateSettings();
});

// Aggiungi evento di click sul pulsante di chiusura
closeButton.addEventListener("click", (e) => {
    e.stopPropagation(); // Evita che il body rilevi il click
    rotateSettings();
});

// Aggiungi evento di click sul body per rimuovere la rotazione SOLO se il click NON è nel menu
document.body.addEventListener("click", (e) => {
    // Se il click è dentro il menu, non fare nulla
    if (menu.contains(e.target) || settingsButton.contains(e.target)) {
        return;
    }

    // Se il pulsante è ruotato, rimuovilo
    if (settingsButton.classList.contains("rotate")) {
        settingsButton.classList.remove("rotate");
    }
});



// SEARCHBAR
// Seleziona l'icona della lente e la barra di ricerca
const searchIcon = document.querySelector("#searchIcon");
const searchBar = document.querySelector("#searchBar");

// Aggiungi evento di click per mostrare/nascondere la barra di ricerca
searchIcon.addEventListener("click", (e) => {
    e.stopPropagation(); // Evita che il click si propaghi al body
    searchBar.classList.toggle("d-none"); // Mostra/nasconde la barra
});

// Aggiungi evento al body per chiudere la barra di ricerca quando clicchi fuori
document.body.addEventListener("click", (e) => {
    if (!searchBar.contains(e.target) && !searchIcon.contains(e.target)) {
        searchBar.classList.add("d-none");
    }
});




