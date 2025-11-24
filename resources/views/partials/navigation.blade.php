<nav class="navbar navbar-expand-lg navbar-light bg-gradient">
    <div class="container-fluid w-750">
        <a class="navbar-brand mx-auto" href="#">Shipments</a> <!-- Centriran logotip -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav"> <!-- Navigacija poravnata desno -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shipments.index') }}">Shipments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shipments.create') }}">Add - 📦</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<style>
    .navbar {
        background: linear-gradient(to right, #6a11cb, #2575fc) !important; /* Linear gradient pozadina sa !important */
        padding: 3px 0; /* Dodajemo razmak oko navbar-a */
        display: flex;
        justify-content: space-between; /* Razmak između logotipa i stavki menija */
        align-items: center; /* Centriranje elemenata unutar navbar-a */
    }

    /* Centriranje logotipa unutar navbar-a */
    .navbar .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: white;
        text-align: center;
        flex-grow: 1; /* Ovaj kod osigurava da logotip bude centriran */
    }

    /* Stilizacija nav linkova */
    .navbar .nav-link {
        color: white !important;
        font-size: 1.1rem;
        font-weight: bold;
        margin: 0 15px; /* Razmak između linkova */
    }

    /* Hover efekat na linkovima */
    .navbar .nav-link:hover {
        color: #ffd700 !important; /* Zlatna boja pri hover-u */
    }

    /* Aktivni link */
    .navbar .nav-link.active {
        color: #ffd700 !important; /* Zlatna boja za aktivni link */
    }

    /* Stil za dugme za hamburger meni */
    .navbar-toggler {
        border-color: white !important; /* Bela boja okvira za dugme */
    }

</style>
