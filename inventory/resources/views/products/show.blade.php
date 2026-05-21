<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .details-wrapper {
            max-width: 600px;
            margin: 30px auto 0;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .page-title {
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 3px solid #17a2b8;
            padding-bottom: 15px;
            font-weight: 600;
        }
        .product-details {
            margin-bottom: 30px;
        }
        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
            align-items: center;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #2c3e50;
            min-width: 150px;
        }
        .detail-value {
            color: #212529;
            font-size: 1.1rem;
        }
        .btn-group-action {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .btn-group-action .btn {
            padding: 10px 20px;
            font-weight: 600;
        }
        .info-section {
            background-color: #e8f4f8;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #17a2b8;
        }
        .info-section p {
            margin: 0;
            font-size: 0.95rem;
            color: #0c5460;
        }
    </style>
</head>
<body>
    <div class="details-wrapper">
        <h1 class="page-title">👁️ Product Details</h1>

        <div class="info-section">
            <p class="mb-0"><strong>Product ID:</strong> #{{ $product->id }} | <strong>Last Updated:</strong> {{ $product->updated_at->format('M d, Y g:i A') }}</p>
        </div>

        <div class="product-details">
            <div class="detail-row">
                <div class="detail-label">Product Name:</div>
                <div class="detail-value">{{ $product->product_name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Category:</div>
                <div class="detail-value">
                    {{ $product->category }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Quantity:</div>
                <div class="detail-value">
                    @if ($product->quantity > 10)
                        {{ $product->quantity }} in stock
                    @elseif ($product->quantity > 0)
                        {{ $product->quantity }} in stock
                    @else
                        Out of Stock
                    @endif
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Unit Price:</div>
                <div class="detail-value">
                    <strong>₱{{ number_format($product->price, 2) }}</strong>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Date Added:</div>
                <div class="detail-value">{{ $product->date_added->format('F d, Y') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Created At:</div>
                <div class="detail-value">{{ $product->created_at->format('F d, Y g:i A') }}</div>
            </div>
        </div>

        <div class="btn-group-action">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                ← Back to Products
            </a>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                ✏️ Update Product
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                🗑️ Delete
            </button>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong>{{ $product->product_name }}</strong>?</p>
                    <p class="text-muted">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
