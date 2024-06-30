@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product Info</h1>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('productinfo.update', ['product' => $product->id, 'info' => $info->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Product Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
