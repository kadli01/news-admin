@extends('layouts.template')

@section('content')
<form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
	<div class="dashboard-header">
		<h1>{{ $user->name }}</h1>
		<small>Edit Profile</small>
		<button type="submit" class="btn btn-lg btn-success pull-right" id="submit-form">Save</button>
	</div>

	<div class="dashboard-content">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		
		@include('admin.profile.form')
	</div>
</form>
@endsection