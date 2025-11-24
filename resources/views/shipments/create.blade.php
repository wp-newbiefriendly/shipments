@extends('partials.layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Shipment</h2>

        <form action="{{ route('shipments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="from_city" class="form-label">From City</label>
                <input type="text" class="form-control" id="from_city" name="from_city" required>
            </div>

            <div class="mb-3">
                <label for="from_country" class="form-label">From Country</label>
                <input type="text" class="form-control" id="from_country" name="from_country" required>
            </div>

            <div class="mb-3">
                <label for="to_city" class="form-label">To City</label>
                <input type="text" class="form-control" id="to_city" name="to_city" required>
            </div>

            <div class="mb-3">
                <label for="to_country" class="form-label">To Country</label>
                <input type="text" class="form-control" id="to_country" name="to_country" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>
                    <option value="Active">Active</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id" required>
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Shipment</button>
        </form>
    </div>
@endsection
