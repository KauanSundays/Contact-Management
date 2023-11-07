<!-- mostrar.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>CRUD</title>
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="mb-4">Lista de Jogadores</h1>
    <div class="container center-content mt-4">
        <div id class="container-box text-center">
            @if($contacts->isEmpty())
                <p>Contact List is Empty.</p>
                <br>
            @else
            @foreach($contacts as $contact)
            <div>
                <p>Nome: {{ $contact->name }}, Posição: {{ $contact->telefone }}</p> 
                <form action="/delete-contact/{{ $contact->id }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                
                <form action="/edit-contact/{{ $contact->id }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-warning" onclick="mostrarFormEditar()">Editar</button>

                </form>
            </div>
            @endforeach

            <button onclick="window.location.href='/create-contact'" class="btn btn-info">
                Create New Contacts
            </button>
            @endif
    

</body>
</html>
        