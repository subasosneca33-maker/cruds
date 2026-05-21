<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .form-wrapper {
            max-width: 600px;
            margin: 30px auto 0;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .form-title {
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-group-form {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }
        .btn-group-form .btn {
            padding: 10px 30px;
            font-weight: 600;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .alert {
            border-radius: 6px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h1 class="form-title">➕ Add New Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>⚠️ Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product_name" class="form-label">Product Name *</label>
                <input 
                    type="text" 
                    class="form-control @error('product_name') is-invalid @enderror" 
                    id="product_name" 
                    name="product_name" 
                    placeholder="Enter product name" 
                    value="{{ old('product_name') }}"
                    required>
                @error('product_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Category *</label>
                <input 
                    type="text" 
                    class="form-control @error('category') is-invalid @enderror" 
                    id="category" 
                    name="category" 
                    placeholder="e.g., Electronics, Clothing, Food" 
                    value="{{ old('category') }}"
                    required>
                @error('category')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantity" class="form-label">Quantity *</label>
                <input 
                    type="number" 
                    class="form-control @error('quantity') is-invalid @enderror" 
                    id="quantity" 
                    name="quantity" 
                    placeholder="Number of items" 
                    value="{{ old('quantity', 0) }}"
                    min="0"
                    required>
                @error('quantity')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price (₱) *</label>
                <input 
                    type="number" 
                    class="form-control @error('price') is-invalid @enderror" 
                    id="price" 
                    name="price" 
                    placeholder="0.00" 
                    step="0.01"
                    value="{{ old('price', 0) }}"
                    min="0"
                    required>
                @error('price')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-group-form">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    ← Back to Products
                </a>
                <button type="submit" class="btn btn-success">
                    ✓ Add Product
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
