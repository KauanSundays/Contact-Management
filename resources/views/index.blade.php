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
        <button onclick="window.location.href='/'" class="btn btn-warning">
            Create New Contacts
        </button>
    @else
        @foreach($contacts as $contact)
            <div>
                <p>Contact Name: {{ $contact->name }}, Posição: {{ $contact->email }}</p>
                <form action="/excluir-contact/{{ $contact->id }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <form action="/editar-contacts/{{ $contact->id }}" method="GET" style="display: inline-block;">
                    <button type="submit" class="btn btn-warning" onclick="mostrarFormEditar()">Editar</button>
                </form>
            </div>
        @endforeach
    @endif

    <button>
        <a href="/create-contact">Create new contact</a>
    </button>
</body>
</html>
