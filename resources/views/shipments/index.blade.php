@php use App\Models\User; @endphp
@extends('partials.layout')

@section('content')
    @if(session('success'))
        <div class="text-center alert alert-success" id="successMessage">
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
                            {{--                            <p><strong>Trucker ID:</strong> {{ $shipment->user_id }}</p>--}}
                            <p><strong>Client ID:</strong> {{ $shipment->client_id }}</p>
                            <form method="POST"
                                  action="{{ route('shipments.assignUser', ['shipment' => $shipment->id]) }}"
                                  class="mt-2">
                                @csrf

                                <div class="d-flex gap-2">
                                    <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
                                    <select name="user_id" class="form-select form-select-sm">
                                        <option selected disabled>Select client</option>
                                        @foreach(User::where('role','client')->get() as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $shipment->client_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} ({{ $user->id }})
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                        Assign
                                    </button>
                                </div>
                            </form>


                        </div>
                        <div class="col-12 text-center mb-2">
                            <a href="{{ route('shipments.show', $shipment->id) }}" class="btn btn-primary">View</a>
                        </div>
                        <div class="col-12 text-center mb-4">
                            <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-success">Edit</a>
                        </div>

                        <div class="col-12 text-center mb-2">
                            <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this shipment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                        <div class="card-footer text-muted text-center">
                            <small>Shipment ID: {{ $shipment->id }}</small>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

{{--    <livewire:shipments-assigned-list></livewire:shipments-assigned-list>--}}
   @livewire('shipments-assigned-list')
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
<script>
    // Provera da li postoji poruka sa uspehom
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('successMessage');

        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 2000);
        }
    });
</script>

