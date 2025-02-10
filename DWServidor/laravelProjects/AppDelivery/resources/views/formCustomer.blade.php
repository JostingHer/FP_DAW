<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet"> 
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

  a:hover{
        text-decoration: underline;
        color: black;
  }
  .navegacion__link--registrar:hover{
    text-decoration: underline;
    color: white;


  }
    </style>
</head>
<body>
    <header class="header ">
        <div class="header__logo">
            <img src="{{ asset('img/logo.svg') }}" alt="logo">
        </div>
        <div>
            <nav class="navegacion">
           
                <a href="{{ url('/') }}" class="navegacion__link">Inicio</a>
                <a href="{{ url('/products') }}" class="navegacion__link">Platos</a>
                <a href="{{ url('/companyDeliveries') }}" class="navegacion__link">Empresas</a>
                <a href="{{ url('/orders') }}" class="navegacion__link">Pedidos</a>
        
                <a class="navegacion__link" href="{{ url('/cart') }}">
                    
                    <span><i class="bi bi-cart-plus-fill"> Carrito</i></span>
                  </a>
            </nav>
        </div>
        <nav class="navegacion">
           
            @if (Route::has('login'))
                    @auth

                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                          </svg>
                          {{ Auth::user()->name }}
                    </div>
                      <a href="{{ route('logout') }}" class="navegacion__link">Cerrar sesion</a>

                   
                           @else
                            <a href="{{ route('login') }}"          class="navegacion__link--registrar">Iniciar sesion</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navegacion__link--registrar">Crear cuenta</a>
                            @endif
                    @endauth
            @endif
        </nav>
    </header>


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

                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                               
                            {{-- Formulario --}}
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
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
                               
                                    @else


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
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
