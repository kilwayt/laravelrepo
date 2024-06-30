<!-- resources/views/products/create_product_info.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Product Info for {{ $product->name }}</h1>

    <form action="{{ route('productinfo.store', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="not_active">Not Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Info</button>
    </form>
</div>
@endsection
