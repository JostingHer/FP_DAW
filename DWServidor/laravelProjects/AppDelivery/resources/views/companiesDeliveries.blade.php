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

  .product__cart{
    display: grid;
    grid-template-columns: auto auto;
    align-content: center;
    align-items: center;
    font-size: 0.8em;

  }

  .error{
    background-color: #303f46;;
    padding: 5px;
    color: white;
    font-weight: bold;

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
                        <form  method="POST" action="{{ route('logout') }}">
                            @csrf

                           {{-- / <a href="{{ route('logout') }}" class="navegacion__link">Cerrar sesion</a> --}}

                        <button class="navegacion__link" type="submit">Cerrar sesion</button>
                        </form>
                   
                           @else
                            <a href="{{ route('login') }}" class="navegacion__link--registrar">Iniciar sesion</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navegacion__link--registrar">Crear cuenta</a>
                            @endif
                    @endauth
            @endif
        </nav>
    </header>

    
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Empresas de delivery</h1>

        <table class="table table-bordered">
            <thead >
                <tr>
                    <th>ID Empresa</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>
</body>
</html>
