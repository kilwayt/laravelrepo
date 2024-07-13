@extends('layouts.app')

@section('content')
<div class="container text-center mt-4"> <!-- Added mt-4 (margin-top: 4) for spacing -->
    <h1>Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Price</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->start_date }}</td>
                    <td>{{ $order->end_date }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-3"> <!-- Added margin-top and text-center for the "Create Order" button -->
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
    </div>
</div>
@endsection
