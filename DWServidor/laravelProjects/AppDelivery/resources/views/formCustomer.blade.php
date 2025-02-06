<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Resumen del Pedido</h4>
                        
                            @php
                                $cart = json_decode(Cookie::get('cart', '[]'), true);
                            @endphp
                        
                            @if (!empty($cart))
                                @foreach ($cart as $productId =>$item)
                                    <p>Producto: <strong>{{ $item['name'] }}</strong></p>
                                    <p>Precio: <strong>€{{ number_format($item['price'], 2) }}</strong></p>
                                    <p>Cantidad: <strong>{{ $item['quantity'] }}</strong></p>

                                    <div class="col-2">
                                        <a href="{{ route('cart.increase', $productId) }}" class="btn btn-outline-secondary">+</a>
                                        <a href="{{ route('cart.decrease', $productId) }}" class="btn btn-outline-secondary">-</a>
                                    </div>
                                    
                                    <div class="col-1">
                                        <a href="{{ route('cart.remove', $productId) }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    
                                    <hr>
                                @endforeach
                            @else
                                <p>No hay productos en el carrito.</p>
                            @endif
                        </div>
                        
                        <div class="col-md-6">
                            <h2 class="mb-3">Formulario Cliente</h2>
                            
                            {{-- Mensaje de éxito --}}
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            {{-- Formulario --}}
                            <form action="" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required>
                                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" pattern="^[6789]\d{8}$" required>
                                    @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tarjeta" class="form-label">Tarjeta de Crédito</label>
                                    <input type="text" class="form-control @error('tarjeta') is-invalid @enderror" name="tarjeta" pattern="\d{13,19}" required>
                                    @error('tarjeta') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="delivery" class="form-label">Empresa de Delivery</label>
                                    <select class="form-select @error('delivery') is-invalid @enderror" name="delivery">
                                        <option value="empresa1">Empresa 1</option>
                                        <option value="empresa2">Empresa 2</option>
                                    </select>
                                    @error('delivery') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
