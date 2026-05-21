<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .form-container {
            max-width: 600px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
            margin: 20px auto;
        }
        .form-title {
            color: #333;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-group-form {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">➕ Add New Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fix the following errors:</strong>
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
                <label for="product_name" class="form-label"><strong>Product Name *</strong></label>
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
                <label for="category" class="form-label"><strong>Category *</strong></label>
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
                <label for="quantity" class="form-label"><strong>Quantity *</strong></label>
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
                <label for="price" class="form-label"><strong>Price (₱) *</strong></label>
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
