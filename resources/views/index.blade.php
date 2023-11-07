<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Contacts List</h1>

    @if($contacts->isEmpty())
        <p>Contact List is Empty.</p>
        <br>
    @else
        @foreach($contacts as $contact)
            <div>
                <p>
                    Contact Name: {{ $contact->name }}, 
                    Posição: {{ $contact->email }},
                    <form action="/delete-contact/{{ $contact->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>,
                    <form action="/edit-contact/{{ $contact->id }}" method="GET">
                        <button type="submit" class="btn btn-warning" onclick="mostrarFormEditar()">Editar</button>
                    </form>
                </p>   
            </div>
        @endforeach
    @endif

    <button onclick="window.location.href='/create-contact'" class="btn btn-warning">
        Create New Contacts
    </button>
</body>
</html>
