@extends('partials.layout')

@section('content')
    @if(session('success'))
        <div class="text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            @foreach($shipments as $shipment)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm rounded">
                        <div class="card-header bg-primary text-white text-center">
                            <h5>{{ $shipment->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Price:</strong> ${{ number_format($shipment->price, 2) }}</p>
                            <p><strong>From:</strong> {{ $shipment->from_city }}, {{ $shipment->from_country }}</p>
                            <p><strong>To:</strong> {{ $shipment->to_city }}, {{ $shipment->to_country }}</p>
                            <p><strong>Status:</strong> <span
                                    class="badge {{ $shipment->status == 'done' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($shipment->status) }}</span>
                            </p>
                            <p><strong>Details:</strong> {{ Str::limit($shipment->details, 150) }} <a href="#"
                                                                                                      class="text-primary">Read
                                    more</a></p>
                            <p><strong>User ID:</strong> {{ $shipment->user_id }}</p>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <small>Shipment ID: {{ $shipment->id }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: linear-gradient(to right, #6a11cb, #2575fc) !important; /* Linear gradient za pozadinu naslova */
        color: white !important; /* Bela boja teksta na naslovu */
        font-size: 1.25rem; /* Veći font za naglašeni naslov */
        font-weight: bold; /* Boldovan tekst za naslov */
        padding: 15px; /* Razmak unutar naslova */
        border-radius: 10px 10px 0 0; /* Zaobljeni gornji uglovi naslova */
    }


    .card-footer {
        border-radius: 0 0 10px 10px;
    }

    .text-center {
        text-align: center;
    }

    .badge {
        font-size: 14px;
        font-weight: bold;
    }

    .card-body p {
        font-size: 16px;
        line-height: 1.5;
    }

</style>
