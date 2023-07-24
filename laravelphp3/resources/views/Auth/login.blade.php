@extends('template.layout')
@section('content')
    <form action="{{ route('router_login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Pass</label>
            <input type="password" name="password" class="form-control"  >
        </div>
        <button type="submit" class="btn btn-success">Đăng nhập</button>
    </form>
@endsection
