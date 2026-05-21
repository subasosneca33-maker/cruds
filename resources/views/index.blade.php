@extends('layout.master')
@section('content')
    <table border="1px">
        <thead>
            <tr>
            <td> ID </td>    
            <td> First name </td>
            <td> Last name </td>
            <td> gender </td>
            <td> qualifications </td>
    </tr>
    </thead>
    <tbody>
        @foreach($cruds as $crud)
        <tr border="none">
            <td>{{ $crud->id}}</td>
            <td> {{ $crud->first_name }} </td>
            <td> {{ $crud->last_name }} </td>
            <td> {{ $crud->gender }} </td>
            <td> {{ $crud->qualifications }} </td>
            <td>
                <form action= "{{ route('users.edit', $crud->id) }}" method="GET">
                    @csrf
                    <button class="btn btndanger" type="submit">Edit</button>
                </form>
            </td>

            <td>
                <form action= "{{ route('users.destroy', $crud->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btndanger" type="submit">Delete</button>
                </form>
        </tr>

        @endforeach
        </tbody>
        </table>
@endsection