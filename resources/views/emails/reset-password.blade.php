<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hai {{$name}}</h1>
    <p>click tombol berikut untuk melakukan reset password</p>
    <a href="{{url('reset-password/'. $email.'/'.$token)}}"><button>reset-password</button></a>
    <p>atau bisa klik link berikut <a href="{{url('reset-password/'. $email.'/'.$token)}}">{{url('reset-password/'. $email.'/'.$token)}}</a></p>
</body>
</html>