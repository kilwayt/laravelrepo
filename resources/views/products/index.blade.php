@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f1f6; /* Set the desired background color */
        color: #ffffff; /* Ensure text is white for contrast */
    }
    
    .container {
        margin-top: 100px; /* Adjust this value as needed to avoid navbar overlap */
    }
    .title {
        text-align: center;
        margin-bottom: 30px;
        color: rgb(14, 24, 39);
    }
</style>

<div class="container">
    <h1 class="title">OUR PRODUCTS</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/200x200.png?text=PRODUCT WITHOUT IMAGE' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Stock: {{ $product->stock_count }}</p>
                    </a>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProductModal{{ $product->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProductModal{{ $product->id }}">
                            Delete
                        </button>
                    </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="productName{{ $product->id }}">Name</label>
                                <input type="text" class="form-control" id="productName{{ $product->id }}" name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="productImage{{ $product->id }}">Image</label>
                                <input type="file" class="form-control" id="productImage{{ $product->id }}" name="image">
                            </div>
                            <div class="form-group">
                                <label for="stockCount{{ $product->id }}">Stock Count</label>
                                <input type="number" class="form-control" id="stockCount{{ $product->id }}" name="stock_count" value="{{ $product->stock_count }}" min="0">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Centered Add Product Button -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                Add Product
            </button>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
@include('products.add_product_modal')
@endsection
