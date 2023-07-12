@extends('templates.layout')
@section('content')
    <h1>{{ $name }}</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
        @foreach($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
        </tr>
        @endforeach
    </table>
@endsection

