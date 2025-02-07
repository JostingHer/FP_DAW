<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Empresas delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Empresas de delivery</h1>
    
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple211/v4/b9/48/72/b94872ae-3aee-b52b-aa04-56b813074853/AppIcon-0-0-1x_U007emarketing-0-8-0-0-sRGB-85-220.png/230x0w.webp" alt="image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $company->name }}</h5>
                                <p class="card-text">{{ $company->email }}</p>
                                <p class="card-text">{{ $company->address }}</p>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    
    </div>
</body>
</html>
