@extends('layouts.template')

@section('content')
<form action="{{ route('news.update', ['id' => $news->id]) }}" method="POST" enctype="multipart/form-data">
	<div class="dashboard-header">
		<h1>{{ $news->title }}</h1>
		<small>Edit news</small>
		<button type="submit" class="btn btn-lg btn-success pull-right" id="submit-form">Save</button>
	</div>

	<div class="dashboard-content">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		
		@include('admin.news.form')
	</div>
</form>
@endsection