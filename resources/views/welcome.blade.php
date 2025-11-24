@extends('partials.layout')

@section('content')
    @if(session('success'))
        <div class="text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <!-- Sekcija 1 - Prvi red -->
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Shipments Management</h5>
                        <p class="card-text">Manage your shipments easily.</p>
                        <a href="{{ route('shipments.create') }}" class="btn btn-primary">Add 📦</a>
                    </div>
                </div>
            </div>
            <!-- Sekcija 2 - Drugi red -->
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Track Shipments</h5>
                        <p class="card-text">Track your shipments in real time.</p>
                        <a href="{{ route('shipments.index') }}" class="btn btn-primary">View Shipments</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider sekcija (ako je potrebno) -->
        <div id="carouselExampleAutoplaying" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="path_to_image_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Shipment Updates</h5>
                        <p>Stay updated with the latest shipment news.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="path_to_image_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fast Shipping</h5>
                        <p>Get your shipments delivered fast and securely.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

@endsection
<style>
    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
    }

    .carousel-inner img {
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    .carousel-caption {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        border-radius: 10px;
    }

</style>
