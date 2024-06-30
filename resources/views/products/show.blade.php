@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: rgb(14, 24, 39); /* Set the desired background color */
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
    .card{
        background-color: #f0f1f6;
        width: 1OO0px;
    }
    h1{
        color: #f0f1f6;
        text-align: center;
    }
    
</style>
<div class="container">
    <h1>{{ $product->name }}</h1>
    
    <div class="container-fluid mt-5">
        <div class="row justify-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-success">Product Information</h4>
                        @if ($productInfos->isEmpty())
                            <p>No product information available.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-success">
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productInfos as $info)
                                            <tr>
                                                <td>{{ $info->id }}</td>
                                                <td>{{ $info->username }}</td>
                                                <td>{{ $info->password }}</td>
                                                <td>{{ $info->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductInfoModal{{ $info->id }}">
                                                        <i class="mdi mdi-pencil"></i> Edit
                                                    </button>
                                                    
                                                    <form action="{{ route('productinfo.destroy', ['product' => $product->id, 'info' => $info->id]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">
                                                            <i class="mdi mdi-delete"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Edit Product Info Modal -->
                                            <div class="modal fade" id="editProductInfoModal{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="editProductInfoModalLabel{{ $info->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('productinfo.update', ['product' => $product->id, 'info' => $info->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editProductInfoModalLabel{{ $info->id }}">Edit Product Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" name="username" class="form-control" value="{{ $info->username }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" class="form-control" value="{{ $info->password }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select name="status" class="form-control" required>
                                                                        <option value="active" {{ $info->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="not_active" {{ $info->status == 'not_active' ? 'selected' : '' }}>Not Active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update Info</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-auto">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductInfoModal">
                Add Product Info
            </button>
        </div>
    </div>
</div>

<!-- Add Product Info Modal -->
<div class="modal fade" id="addProductInfoModal" tabindex="-1" role="dialog" aria-labelledby="addProductInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('productinfo.store', $product->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductInfoModalLabel">Add Product Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="not_active">Not Active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Info</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
