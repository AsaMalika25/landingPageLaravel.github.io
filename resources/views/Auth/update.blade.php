<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('komponen/pesan')  
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>LOGIN</h1>
        <form action="sesi/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password confirmation</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>