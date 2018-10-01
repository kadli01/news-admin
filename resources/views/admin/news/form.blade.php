
{{-- <div class="form-group"> --}}

	<div class="form-group row">
        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ checkOld('title', $news) }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

        @if($news->featured_image)
            <div class="row">
                <div class="col-md-6 offset-md-2">
                    <img src={{env('APP_URL') . "/storage/img/" . $news->featured_image}}>
                </div>
            </div>
        @endif
    <div class="form-group row">
        <label for="featured_image" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

        <div class="col-md-6">
            <input id="featured_image" type="file" class="form-control{{ $errors->has('featured_image') ? ' is-invalid' : '' }}" name="featured_image" value="{{ checkOld('featured_image', $news) }}">

            @if ($errors->has('featured_image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('featured_image') }}</strong>
                </span>
            @endif
        </div>
    </div>


	<div class="form-group row">
        <label for="excerpt" class="col-md-2 col-form-label text-md-right">{{ __('Excerpt') }}</label>

        <div class="col-md-6">
            <input id="excerpt" type="text" class="form-control{{ $errors->has('excerpt') ? ' is-invalid' : '' }}" name="excerpt" value="{{ checkOld('excerpt', $news) }}" required>

            @if ($errors->has('excerpt'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('excerpt') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<div class="form-group row">
        <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <textarea id="description" rows="8" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ checkOld('description', $news) }}</textarea> 

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
{{-- </div> --}}

