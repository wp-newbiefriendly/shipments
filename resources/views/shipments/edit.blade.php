@extends('partials.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @section('content')
        @if(session('success'))
            <div class="text-center alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif

    <div class="container mt-5">
        <h2>Edit Shipment</h2>

        <form action="{{ route('shipments.update', $shipment->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')  <!-- @method('PUT') da bi Laravel znao da se radi o update zahtevu -->

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $shipment->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="from_city" class="form-label">From City</label>
                <input type="text" class="form-control" id="from_city" name="from_city" value="{{ old('from_city', $shipment->from_city) }}" required>
            </div>

            <div class="mb-3">
                <label for="from_country" class="form-label">From Country</label>
                <input type="text" class="form-control" id="from_country" name="from_country" value="{{ old('from_country', $shipment->from_country) }}" required>
            </div>

            <div class="mb-3">
                <label for="to_city" class="form-label">To City</label>
                <input type="text" class="form-control" id="to_city" name="to_city" value="{{ old('to_city', $shipment->to_city) }}" required>
            </div>

            <div class="mb-3">
                <label for="to_country" class="form-label">To Country</label>
                <input type="text" class="form-control" id="to_country" name="to_country" value="{{ old('to_country', $shipment->to_country) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $shipment->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    @foreach(\App\Models\Shipment::ALLOWED_STATUSES as $status)
                        <option value="{{ $status }}" {{ $shipment->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="documents" class="form-label">Documents</label>
                <input type="file" name="documents[]" id="documents" class="form-control-file" multiple>
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details">{{ old('details', $shipment->details) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Shipment</button>
        </form>
    </div>
@endsection
