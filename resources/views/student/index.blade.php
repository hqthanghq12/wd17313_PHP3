@extends('templates.layout')
@section('content')
    <h1>{{ $name }}</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Hình ảnh</td>
            <td>Action</td>
        </tr>
        @foreach($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
            <td><a href="{{ route('route_student_delete',['id'=>$st->id]) }}">Xóa</a></td>
        </tr>
        @endforeach
    </table>
@endsection

