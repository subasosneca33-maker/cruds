@extends('layout.master')
@section('content')
    
<form method="post" action="{{ route('users.store') }}">
	@csrf
	<div class="form-group">
		<label for="first_name">First Name:</label><br><br>
		<input type="text" class="formcontrol" name="first_name"><br><br>
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label><br><br>
		<input type="text" class="formcontrol" name="last_name"><br><br>
	</div>
	<div class="form-group">
		<label for="gender">Gender:</label><br><br>
		<input type="text" class="formcontrol" name="gender"><br><br>
	</div>
	<div class="form-group">
		<label for="qualifications">Qualifications:</label><br><br>
		<input type="text" class="formcontrol" name="qualifications"><br><br>
	</div>
	<br>
	<button type="submit" class="btn-btn">Insert</button>
</form>
@endsection