<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/create" method="POST">
        @csrf
        <label for="">Name:</label>
        <input type="text" name="name">
    
        <label for="">Contact: </label>
        <input type="text" name="contact">
        
        <label for="">Email Address:</label>
        <input type="text" name="email">
    
        <button>Send</button>
    </form>
</body>
</html>