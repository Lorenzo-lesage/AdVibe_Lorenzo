# Advibe - Marketplace di Annunci

# Advibe è un sito web per la pubblicazione di annunci di prodotti tecnologici. Offre un sistema completo di autenticazione, creazione annunci, revisione, wishlist, profili utente e ricerca avanzata.
## Tecnologie utilizzate:
- Laravel: per la realizzazione del progetto
- MySQL: come database relazionale
- Fortify: per l'autenticazione
- Livewire: per la creazione e validazione degli annunci
- Laravel Scout: per la ricerca avanzata (full-text e parziale)
- Blade Flags: per la gestione multilingua
- Imagick: per il crop e watermark automatico delle immagini
- Bootstrap: per il frontend e la responsività
- AOS & Swiper: per animazioni frontend
- MailTrap: per l'accettazione di richiesta di diventare revisore traimte email

## Funzionalità principali

- **Autenticazione completa**
  - Registrazione, login, middleware per restrizioni

- **Creazione annunci con Livewire e validazioni real-time**

- **Inserimento di immagini multiple** (fino a 10) con preview e rimozione

- **Crop automatico e applicazione di watermark personalizzato alle immagini**

- **Sistema di revisione annunci**:
  - Gli utenti possono richiedere di diventare revisori tramite un pulsante
  - Il revisore può accettare o rifiutare l'annuncio
  - Notifica dinamica del numero di annunci da revisionare
  - Il revisore può ripristinare annunci già valutati per rivalutarli
  - Il revisore può pubblicare annunci ma non può revisionare i propri articoli

- **Ricerca avanzata**:
  - Ricerca per categoria
  - Barra di ricerca con ricerca full-text o parziale

- **Wishlist**:
  - Ogni utente può salvare annunci tra i preferiti
  - Possibilità di vedere gli annunci preferiti nella propria area personale

- **Profilo utente**:
  - CRUD completo del profilo (creazione, modifica, visualizzazione, eliminazione)
  - Visualizzazione dei profili degli altri utenti e dei relativi annunci preferiti o creati

- **Traduzione multilingua**:
  - Tutto il sito è tradotto (compresi messaggi di validazione, successo e errore)

- **Area personale**:
  - Ogni utente può vedere i propri annunci creati e quelli preferiti

- **Responsive**:
  - Interamente responsive e ottimizzato per mobile, tablet e desktop

