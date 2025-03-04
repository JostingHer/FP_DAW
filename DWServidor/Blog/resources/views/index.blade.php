<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet"> 
   

    <!-- Bootstrap CSS -->
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->
    
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Crear post</a>
    
        <div class="row">
            @foreach ($posts as $post)
                <div id="post" class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->titulo }}</h5>
                            <p class="card-text">{{ $post->autor }}</p>
                            <p class="card-text">{{ $post->fecha }}</p>
                            <p class="card-text">{{ $post->contenido }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Ver más</a>
                            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger">Eliminar</a>
                            {{-- <a href="{{ route('post.', $post->id) }}" class="btn btn-secondarys">Update</a> --}}


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</body>
</html>