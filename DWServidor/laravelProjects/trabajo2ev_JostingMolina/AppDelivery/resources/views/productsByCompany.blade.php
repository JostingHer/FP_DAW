<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos de {{ $companyName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Productos de {{ $companyName }}</h1>

        <!-- Filtro por empresa -->
        <div class="d-flex justify-content-center mb-4">
            @foreach ($companies as $name)
                <a href="{{ route('products.productsFilterByCompany', $name) }}" 
                   class="btn btn-outline-primary mx-1 
                          {{ $name === $companyName ? 'active' : '' }}">
                    {{ $name }}
                </a>
            @endforeach
        </div>

        <!-- Lista de productos -->
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="fw-bold">Precio: €{{ number_format($product->price, 2) }}</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Agregar al Pedido</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
