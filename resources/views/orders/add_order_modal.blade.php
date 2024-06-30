<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Create New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="orderName">Name</label>
                        <input type="text" class="form-control" id="orderName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="productId">Product</label>
                        <select class="form-control" id="productId" name="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orderPrice">Price</label>
                        <input type="text" class="form-control" id="orderPrice" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="orderDescription">Description</label>
                        <textarea class="form-control" id="orderDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="orderStartDate">Start Date</label>
                        <input type="date" class="form-control" id="orderStartDate" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="orderEndDate">End Date</label>
                        <input type="date" class="form-control" id="orderEndDate" name="end_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
