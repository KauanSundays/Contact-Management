<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('index.css')}}">
</head>
<body>
    <h1>Contacts List</h1>

    @if($contacts->isEmpty())
        <p>Contact List is Empty.</p>
        <br>
    @else
    @foreach($contacts as $contact)
            <li>
                <p>
                    Contact Name: {{ $contact->name }},
                    Email: {{ $contact->email }}
                </p>
                <form action="/delete-contact/{{ $contact->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <form action="/edit-contact/{{ $contact->id }}" method="GET">
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
            </li> 
    @endforeach


    @endif

    <button onclick="window.location.href='/create-contact'" class="btn btn-info">
        Create New Contacts
    </button>
</body>
</html>
