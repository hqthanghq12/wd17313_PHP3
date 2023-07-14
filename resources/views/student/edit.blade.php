@extends('templates.layout')
@section('content')
    <form action="{{ route('route_student_edit',['id'=>$student->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Email </label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control">
        </div>
        <button class="btn-success" type="submit">Sửa</button>
    </form>
@endsection