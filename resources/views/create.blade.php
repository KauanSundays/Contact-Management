<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <title>Create Contact</title>
</head>
<body style="background: chocolate">
    <div class="container-box text-center">
        <form action="/create" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" placeholder="Enter the name" class="form-control" name="name" id="name" required>
                <div id="name-error" style="color: red;"></div>
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" placeholder="9-9999-9999" class="form-control" name="contact" id="contact" maxlength="9">
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="text" placeholder="Enter the Email Address" class="form-control" name="email" id="email">
            </div>

            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>

    <button onclick="window.location.href='/'" class="btn btn-warning">
        Read ALL Contacts
    </button>

    <script>
        function validateForm() {
        var nameInput = document.getElementById("name");
        var nameError = document.getElementById("name-error");

        if (nameInput.value.length < 5) {
            nameError.innerHTML = "O nome deve ter no mínimo 5 caracteres.";
            nameError.style.backgroundColor = "red";
            nameError.style.color = "white";
            return false; // Impede o envio do formulário
        } else {
            nameError.innerHTML = ""; // Limpa a mensagem de erro
            return true; // Permite o envio do formulário
        }
    }

    </script>
</body>
</html>