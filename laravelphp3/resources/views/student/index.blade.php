@extends('template.layout')
@section('content')
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
        <td>Hình ảnh</td>
    </tr>
    @foreach($student as $st)
    <tr>
        <td>{{$st->id}}</td>
        <td>{{$st->name}} </td>
        <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
        <td><a href="{{route('route_student_delete',['id'=>$st->id])}}">Xoá</a></td>
    </tr>
    @endforeach
</table>
@endsection
