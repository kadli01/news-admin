@extends('layouts.template')

@section('content')
<div class="dashboard-header">
	<h1>News</h1>
	<small>Overview, editing</small>
	<a href="{{ route('news.create') }}" class="btn btn-lg btn-primary pull-right">New</a>
</div>

<div class="dashboard-content">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Image</th>
				<th>Excerpt</th>
				<th>Created at</th>
				<th>Actions</th>
			</tr>
		</thead>
		@if(count($newsList) > 0)
			<tbody>
				@foreach($newsList as $news)
					<tr>
						<td>{{ $news->id }}</td>
						<td><a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a></td>
						<td>{{ $news->image }}</td>
						<td>{{ $news->excerpt }}</td>
						<td>{{ $news->created_at }}</td>
						<td class="btn-td">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
								<li><a href="{{ route('news.show', ['id' => $news->id]) }}"> View</a></li>
								<li><a href="{{ route('news.edit', ['id' => $news->id]) }}"> Edit</a></li>
								<form action="{{ route('news.destroy', ['id' => $news->id]) }}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<li>
										<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this item: {{ $news->name }}?')">
									</li>
								</form>
								</ul>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		@else
			<tbody>
				<tr>
					<td colspan="6" align="center">
						<h3>There aren't any news yet.</h3>
					</td>
				</tr>
			</tbody>
		@endif
	</table>
	<div class="text-center">
		{!! $newsList->render() !!}
	</div>
</div>
@endsection