
<div class="form-group">
	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label>Title</label>
				<input class="form-control" type="text" name="title" value="{{ checkOld('title', $news) }}" autocomplete="off">
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label>Image</label>
				<input class="form-control" type="fileinput" name="featured_image" value="{{ checkOld('featured_image', $news) }}" autocomplete="off">
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label>Excerpt</label>
				<input class="form-control" type="text" name="excerpt" value="{{ checkOld('excerpt', $news) }}" autocomplete="off">
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				<label>Description</label>
				<textarea class="form-control"  rows="8" name="description" autocomplete="off">{{ $news->description }}</textarea>
			</div>
		</div>
	</div>
</div>

