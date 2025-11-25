@section("title")
    {{ $shipment->title }} - MLS
@endsection

@extends('partials.layout')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow-sm rounded">
                    <div class="id-card-header text-center">
                        <h3>{{ $shipment->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="shipment-details">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>From:</strong> <span>{{ $shipment->from_city }}, {{ $shipment->from_country }}</span>
                                </div>
                                <div class="col-md-6">
                                    <strong>To:</strong> <span>{{ $shipment->to_city }}, {{ $shipment->to_country }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Price:</strong> <span>${{ $shipment->price }}</span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Status:</strong> <span class="badge badge-secondary">{{ $shipment->status }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <strong>Details:</strong>
                                    <p>{{ $shipment->details }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <strong>User ID:</strong> <span>{{ $shipment->user_id }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .shipment-details {
        font-family: 'Arial', sans-serif;
    }

    .shipment-details strong {
        color: #333;
    }

    .shipment-details span {
        color: #555;
    }
    .shipment-details .badge  {
        color: #fff;
    }
    .card {
        border-radius: 8px;
        border: none;
    }

    .id-card-header {
        padding: 12px;
        background: linear-gradient(to left, #6a11cb, #2575fc);
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 20px;
        }
        .card-header h3 {
            font-size: 1.5rem;
        }
    }

</style>
