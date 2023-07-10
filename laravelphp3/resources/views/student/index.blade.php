<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
<h1> Heloooo {{$name}}</h1>
<form action="{{url('student')}}" method="post">
    @csrf
    <label>
        Email
        <input type="text" name="email">
    </label>
    <input type="submit" name="btnsearch" value="Tìm kiếm">
</form>
<table border="1">
    <tr>
    <td>ID</td>
    <td>name </td>
    </tr>
    @foreach($student as $st)
    <tr>
        <td>{{$st->id}}</td>
        <td>{{$st->name}} </td>
    </tr>
    @endforeach
</table>
</body>
</html>
