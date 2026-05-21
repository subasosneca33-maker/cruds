@extends('layout.master')
@section('content')

<form method="Post" action="{{route('users.update',$crud->id)}}">
    @csrf

    <div class="form-group">
        <label for="first_name">First Name:</label><br/><br/>
        <input type="text" class="formcontrol" name="first_name" value="{{$crud->first_name}}">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name:</label><br/><br/>
        <input type="text" class="formcontrol" name="last_name" value="{{$crud->last_name}}">
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label><br/><br/>
        <input type="text" class="formcontrol" name="gender" value="{{$crud->gender}}">
    </div>

    <div class="form-group">
        <label for="qualifications">Qualifications:</label><br/><br/>
        <input type="text" class="formcontrol" name="qualifications" value="{{$crud->qualifications}}">
    </div>

    <br/>
    <button type="submit" class="btn-btn">Update</button>

</form>

@endsection