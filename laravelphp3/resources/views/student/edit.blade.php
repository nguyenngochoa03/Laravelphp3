@extends('template.layout')
@section('content')

    <main class="container mt-4">
        <h1>Sửa Form</h1>
        <form action="{{route('route_student_edit',['id'=>$student->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nameInput">Name:</label>
                <input type="text" class="form-control" value="{{$student->name}}" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="emailInput">Email:</label>
                <input type="text" class="form-control" value="{{$student->email}}" name="email" placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </main>
@endsection

