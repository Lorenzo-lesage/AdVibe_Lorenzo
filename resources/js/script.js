// NAVBAR
let navbar = document.querySelector("#navbar");
let dropdown = document.querySelector("#dropdown-menu");
let dropdownUser = document.querySelector("#dropdown-user");
let dropdownLanguage = document.querySelector("#dropdown-language");

window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        navbar.classList.add("nav-scrolled");
        dropdown.classList.add("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.add("nav-scrolled");
        if (dropdownLanguage) dropdownLanguage.classList.add("nav-scrolled");
    } else {
        navbar.classList.remove("nav-scrolled");
        dropdown.classList.remove("nav-scrolled");
        if (dropdownUser) dropdownUser.classList.remove("nav-scrolled");
        if (dropdownLanguage) dropdownLanguage.classList.remove("nav-scrolled");
    }
});

// ------------------------------------------------------------------------------------------------
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

// ------------------------------------------------------------------------------------------------
// SEARCHBAR
const searchIcon = document.querySelector("#searchIcon");
const searchIconInner = searchIcon.querySelector("i");
const searchBar = document.querySelector("#searchBar");
const logo = document.querySelector(".navbar-brand");
const btnSettings = document.querySelector("#btn-settings");

// Funzione per controllare se siamo su mobile
function isMobile() {
    return window.innerWidth <= 768; // True se la finestra è ≤ 768px (telefono)
}

// Mostra/nasconde la barra di ricerca
searchIcon.addEventListener("click", (e) => {
    e.stopPropagation(); // Evita la chiusura immediata

    // Toggle icon between magnifying glass and left arrow
    if (!searchBar.classList.contains("d-none")) {
        // Se la barra di ricerca è visibile e stiamo per nasconderla
        searchIconInner.classList.remove("bi-arrow-left");
        searchIconInner.classList.add("bi-search");
    } else {
        // Se la barra di ricerca è nascosta e stiamo per mostrarla
        searchIconInner.classList.remove("bi-search");
        searchIconInner.classList.add("bi-arrow-left");
    }

    searchBar.classList.toggle("d-none"); // Mostra/nasconde la barra

    if (isMobile()) {
        logo.classList.toggle("logo-hidden"); // Nasconde il logo SOLO su mobile
        btnSettings.classList.toggle("logo-hidden");
    }
});

// Chiude la barra di ricerca quando si clicca fuori
document.body.addEventListener("click", (e) => {
    // Controlla che il clic non sia sulla barra di ricerca o sull'icona
    if (
        !searchBar.contains(e.target) &&
        !searchIcon.contains(e.target) &&
        !searchBar.classList.contains("d-none")
    ) {
        searchBar.classList.add("d-none"); // Nasconde la barra

        // Change icon back to magnifying glass
        searchIconInner.classList.remove("bi-arrow-left");
        searchIconInner.classList.add("bi-search");
    }
});

// ------------------------------------------------------------------------------------------------
// SWIPER HOMEPAGE
var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1, // Ensures that one slide is shown at a time
    spaceBetween: 40, // Optional: adjusts space between slides
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true, // Optional: allows pagination dots to be clickable
    },
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
});

// ------------------------------------------------------------------------------------------------
// I NOSTRI NUMERI HOME
// Aggiungi questo script nella tua sezione @push('scripts')
document.addEventListener("DOMContentLoaded", function () {
    const counterObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const counters =
                        document.querySelectorAll(".counter-value");
                    counters.forEach((counter) => {
                        const value = counter.innerText;
                        let endValue;

                        // Estrai il valore numerico
                        if (value.includes("K+")) {
                            endValue = parseFloat(value) * 1000;
                        } else if (value.includes("+")) {
                            endValue = parseFloat(value);
                        } else {
                            endValue = parseFloat(value);
                        }

                        // Salva il formato originale
                        const format = value.replace(/[\d.]/g, "");

                        // Animazione di conteggio
                        let startValue = 0;
                        let duration = 2000;
                        let increment = endValue / (duration / 16);

                        const updateCounter = () => {
                            startValue += increment;

                            if (startValue < endValue) {
                                // Formatta il numero in base al formato originale
                                if (format.includes("K+")) {
                                    counter.innerText =
                                        (startValue / 1000).toFixed(1) + "K+";
                                } else if (format.includes("+")) {
                                    counter.innerText =
                                        Math.floor(startValue) + "+";
                                } else {
                                    counter.innerText = startValue.toFixed(1);
                                }
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.innerText = value; // Ripristina il valore originale
                            }
                        };

                        updateCounter();
                    });

                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 }
    );

    const counterSection = document
        .querySelector(".counter-card")
        .closest(".container");
    if (counterSection) {
        counterObserver.observe(counterSection);
    }
});

// ------------------------------------------------------------------------------------------------
// IMMAGINI ZONA REVISORE
document.addEventListener("DOMContentLoaded", function () {
    // Seleziona tutte le immagini con la classe img-effect-revisor
    const images = document.querySelectorAll(".img-effect-revisor");
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = document.querySelector(".close-modal");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const currentIndexEl = document.getElementById("currentImageIndex");
    const totalImagesEl = document.getElementById("totalImages");

    let currentIndex = 0;
    const imagesArray = Array.from(images);
    totalImagesEl.textContent = imagesArray.length;

    // Aggiunge evento click a ogni immagine
    imagesArray.forEach((img, index) => {
        img.addEventListener("click", function () {
            openModal(index);
        });
    });

    function openModal(index) {
        currentIndex = index;
        updateModalImage();
        modal.style.display = "block";
        document.body.style.overflow = "hidden"; // Impedisce lo scorrimento della pagina
    }

    function updateModalImage() {
        modalImg.src = imagesArray[currentIndex].src;
        currentIndexEl.textContent = currentIndex + 1;

        // Animazione di cambio immagine
        modalImg.classList.add("image-change");
        setTimeout(() => {
            modalImg.classList.remove("image-change");
        }, 300);
    }

    // Navigazione al precedente
    prevBtn.addEventListener("click", function () {
        currentIndex =
            (currentIndex - 1 + imagesArray.length) % imagesArray.length;
        updateModalImage();
    });

    // Navigazione al successivo
    nextBtn.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % imagesArray.length;
        updateModalImage();
    });

    // Navigazione con tastiera
    document.addEventListener("keydown", function (e) {
        if (modal.style.display === "block") {
            if (e.key === "ArrowLeft") {
                currentIndex =
                    (currentIndex - 1 + imagesArray.length) %
                    imagesArray.length;
                updateModalImage();
            } else if (e.key === "ArrowRight") {
                currentIndex = (currentIndex + 1) % imagesArray.length;
                updateModalImage();
            } else if (e.key === "Escape") {
                closeModal();
            }
        }
    });

    // Chiude il modal quando si clicca sulla X
    closeBtn.addEventListener("click", function () {
        closeModal();
    });

    // Chiude il modal quando si clicca fuori dall'immagine
    modal.addEventListener("click", function (e) {
        if (
            e.target === modal ||
            e.target.classList.contains("modal-overlay")
        ) {
            closeModal();
        }
    });

    function closeModal() {
        modal.style.display = "none";
        document.body.style.overflow = "auto"; // Ripristina lo scorrimento della pagina
    }

    // Aggiungi stile per l'animazione di cambio immagine
    const style = document.createElement("style");
    style.innerHTML = `
      @keyframes imageChange {
        0% { opacity: 0.5; transform: scale(0.95); }
        100% { opacity: 1; transform: scale(1); }
      }
      .image-change {
        animation: imageChange 0.3s ease;
      }
    `;
    document.head.appendChild(style);
});

// ------------------------------------------------------------------------------------------------

// BOTTONE SEARCH BAR DISABILITATO SE INPUT VUOTO

// Function to handle the first search form
function setupSearchForm(inputSelector, buttonSelector, formSelector) {
    const searchInput = document.querySelector(inputSelector);
    const searchButton = document.querySelector(buttonSelector);

    // Disable the button initially
    if (searchButton) {
      searchButton.disabled = true;
    }

    // Add event listener to the input
    if (searchInput) {
      searchInput.addEventListener('input', function() {
        if (searchButton) {
          // Enable button only if the input has some value
          searchButton.disabled = !this.value.trim();
        }
      });
    }

    // Optional: Reset button state when form is reset
    const form = document.querySelector(formSelector);
    if (form) {
      form.addEventListener('reset', function() {
        if (searchButton) {
          searchButton.disabled = true;
        }
      });
    }
  }

  // Set up both search forms when the DOM is fully loaded
  document.addEventListener('DOMContentLoaded', function() {
    // First search form
    setupSearchForm('#searchInput', '#searchBar #basic-addon2', '#searchBar');

    // Second search form (desktop version)
    setupSearchForm('.d-none.d-lg-block input[name="query"]',
                    '.d-none.d-lg-block #basic-addon2',
                    '.d-none.d-lg-block form');
  });
