<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Management</title>
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
        }
        .page-title {
            color: #333;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        .btn-group-custom {
            margin-bottom: 20px;
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .action-buttons {
            white-space: nowrap;
        }
        .alert {
            margin-bottom: 20px;
        }
        .badge-category {
            font-size: 0.85rem;
            padding: 5px 10px;
            background-color: #e3f2fd !important;
            color: #0288d1 !important;
            border-radius: 4px;
            font-weight: 500;
        }
        .quantity-badge {
            font-size: 0.85rem;
            padding: 5px 10px;
            background-color: #f1f8e9 !important;
            color: #689f38 !important;
            border-radius: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">📦 Product Inventory Management</h1>
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="btn-group-custom">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Add New Product
            </a>
        </div>

        @if ($products->isEmpty())
            <div class="alert alert-info text-center">
                <p>No products found. <a href="{{ route('products.create') }}">Add your first product</a></p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $product->product_name }}</strong></td>
                                <td>
                                    <span>{{ $product->category }}</span>
                                </td>
                                <td>
                                    {{ $product->quantity }}
                                </td>
                                <td>₱{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->date_added->format('M d, Y') }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">
                                        View
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">
                                        Update
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="text-muted">
                        <strong>Total Products:</strong> {{ $products->count() }}
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="text-muted">
                        <strong>Total Inventory Value:</strong> ₱{{ number_format($products->sum('price'), 2) }}
                    </p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
