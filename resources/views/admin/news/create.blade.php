@extends('layouts.template')

@section('content')
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
	<div class="dashboard-header">
		<h1>Add new news</h1>
		<small>Fill out the form</small>
		<button type="submit" class="btn btn-lg btn-success pull-right" id="submit-form">Save</button>
	</div>

	<div class="dashboard-content">
		{{ csrf_field() }}
		@include('admin.news.form')
	</div>
</form>
@endsection