<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>CRUD</title>
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="mb-4">CONTACTS LIST</h1>

    
    <div id class="container-box text-center">
        <form action="/atualizar/{{ $contact->id }}" method="POST">
            @csrf
            @method("PUT")
            <div class="text-left">
                <label for="">Name:</label>
                <input type="text" placeholder="nome_contact" name="name_contact" value="{{$contact->name}}">
            </div>
            <br>
            <div class="text-left">
                <label for="">Number:</label>
                <input type="text" placeholder="number_contact" name="number_contact" value="{{$contact->contact}}">
            </div>
            <br>
            <div class="text-left">
                <label for="">Email:</label>
                <input type="text" placeholder="email_contact" name="email_contact" value="{{$contact->email}}">
            </div>
            <br>
            <div class="text-left">
                <button class="btn btn-success">UPDATE DATA</button>
                <a href="/" class="btn btn-primary">Return Contacts List</a>
            </div>
        </form>
    </div>
</body>
</html>
