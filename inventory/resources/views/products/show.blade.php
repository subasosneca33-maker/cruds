<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 20px;
            max-width: 600px;
        }
        .page-title {
            color: #333;
            margin-bottom: 30px;
            border-bottom: 3px solid #17a2b8;
            padding-bottom: 10px;
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
            font-weight: bold;
            color: #495057;
            min-width: 150px;
        }
        .detail-value {
            color: #212529;
            font-size: 1.1rem;
        }
        .badge-quantity {
            font-size: 1rem;
            padding: 8px 15px;
        }
        .btn-group-action {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            margin-top: 30px;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        .info-section {
            background-color: #e8f4f8;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #17a2b8;
        }
    </style>
</head>
<body>
    <div class="container">
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
