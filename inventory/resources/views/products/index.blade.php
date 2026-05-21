<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .list-wrapper {
            max-width: 1200px;
            margin: 30px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .page-title {
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
            font-weight: 600;
        }
        .btn-group-custom {
            margin-bottom: 30px;
        }
        .btn-group-custom .btn {
            padding: 12px 30px;
            font-weight: 600;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .action-buttons {
            white-space: nowrap;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .action-buttons .btn {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
        .alert {
            border-radius: 6px;
            border: none;
        }
        .text-muted {
            font-weight: 500;
            color: #495057 !important;
        }
        table {
            font-size: 0.95rem;
        }
        thead {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="list-wrapper">
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h1 class="page-title">📦 Product Inventory Management</h1>

        <div class="btn-group-custom">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
                ➕ Add New Product
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
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Delete Modal for {{ $product->product_name }} -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
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
