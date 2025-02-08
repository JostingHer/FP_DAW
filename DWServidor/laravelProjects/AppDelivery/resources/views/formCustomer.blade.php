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
                                <a href="{{ route('cart.clear') }}" class="btn btn-danger">
                                    <i class="fas fa-trash">Borrar todo</i>
                                </a>
                            
                        
                            @php
                                $cart = json_decode(Cookie::get('cart', '[]'), true);
                            @endphp 
                        
                            @if (!empty($cart))
                                @foreach ($cart as $productId =>$item)
                                    <div>
                                        {{-- <img src="{{ $item['image'] }}" alt="image"> --}}
                                        <div>
                                            <p>Producto: <strong>{{ $item['name'] }}</strong></p>
                                            <p>Precio: <strong>€{{ number_format($item['price'], 2) }}</strong></p>
                                            <p>Cantidad: <strong>{{ $item['quantity'] }}</strong></p>

                                            <div class="col-2">
                                                <a href="{{ route('cart.increase', $productId) }}" class="btn btn-outline-secondary">+</a>
                                                <a href="{{ route('cart.decrease', $productId) }}" class="btn btn-outline-secondary">-</a>
                                            </div>
                                            
                                            <div class="col-1">
                                                <a href="{{ route('cart.remove', $productId) }}" class="btn btn-danger">
                                                    <i class="fas fa-trash">Borrar</i>
                                                </a>
                                            </div>
                                            
                                        </div>
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
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                        
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre:</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono:</label>
                                    <input type="text" id="phone" name="phone" class="form-control" pattern="^[6789]\d{8}$" required>
                                    <small class="text-muted">Debe tener 9 dígitos y empezar con 6, 7, 8 o 9.</small>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="credit_card" class="form-label">Tarjeta de Crédito:</label>
                                    <input type="text" id="credit_card" name="credit_card" class="form-control" pattern="^\d{13,19}$" required>
                                    <small class="text-muted">Debe tener entre 13 y 19 dígitos.</small>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="delivery_company" class="form-label">Empresa de Delivery:</label>
                                    <select id="delivery_company" name="delivery_company" class="form-control" required>
                                        <option value="">Seleccione una empresa</option>
                                        @foreach($deliveryCompanies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
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
