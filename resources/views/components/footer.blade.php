<footer class="bg-2 text-color-1 text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row justify-content-between">
            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <img class="logo transition py-2" src="{{ asset('./media/logo.png') }}" alt="Logo footer">
                </a>
                <p>
                    Stai cercando qualcosa di unico? Vuoi vendere ciò che non usi più? AdVibe è il posto giusto per te!
                    La nostra piattaforma di annunci gratuiti ti mette in contatto con acquirenti e venditori di tutta
                    Italia. Con AdVibe puoi pubblicare i tuoi annunci in pochi clic e navigare tra migliaia di offerte
                    con un\'interfaccia intuitiva. Trova articoli di ogni tipo, dalle auto ai vestiti, dai mobili agli
                    animali domestici. I tuoi annunci saranno visti da migliaia di utenti interessati. La nostra
                    piattaforma è sicura e affidabile. Unisciti alla community di AdVibe! Pubblica i tuoi annunci
                    gratuitamente e scopri le migliori offerte del web.
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3 text-lg-end">
                <h5 class="py-2 fw-bold"><span class="text-color-5">Dev</span>Alchemy</h5>
                <p>
                    DevAlchemy è il team di sviluppatori visionari che ha trasformato un\'idea in realtà, creando
                    AdVibe, la piattaforma di annunci che sta rivoluzionando il mercato. Chi sono? Un gruppo di esperti
                    appassionati di tecnologia, con una solida esperienza nello sviluppo di piattaforme web innovative.
                    La loro missione è creare soluzioni digitali intuitive, performanti e user-friendly. Cosa fanno?
                    Curano ogni dettaglio di AdVibe, dal design all\'implementazione delle funzionalità, garantendo
                    un\'esperienza utente ottimale. Sono sempre alla ricerca di nuove tecnologie per migliorare
                    costantemente la piattaforma.'
                </p>
            </div>
        </div>

    </div>
    <!-- Grid container -->

    @auth
        @if (!Auth::user()->is_revisor)
            <div class="container d-flex justify-content-center">
                <div class="row justify-content-center w-100">
                    <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                        <h5 class="align-content-center m-0 fw-bold fs-5 fs-md-3 text-center">
                            Vuoi diventare un <span class="text-color-5">
                                AdVibe</span> revisore?</h5>
                        <a href=""
                            class="btn btn-footer transition mb-5 mt-3 fw-bold w-sm-none">Invia richiesta</a>
                    </div>
                </div>
            </div>
        @endif
    @endauth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-center">
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-facebook fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-instagram fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-twitter-x fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-tiktok fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3 mt-3 border-top mx-5" style="background-color: rgba(0, 0, 0, 0.05);">

        <p class="fs-none"> © 2025 Copyright: DevAlchemy</p>
    </div>
    <!-- Copyright -->
</footer>
