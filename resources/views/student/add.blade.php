@extends('templates.layout')
@section('content')
    <form action="{{ url('/add-student') }}" method="POST">
      @csrf
    <div class="mb-3">
        <label  class="form-label">Email </label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
        <button class="btn-success" type="submit">Gửi</button>
    </form>
@endsection