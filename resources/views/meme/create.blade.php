@extends('layouts.app')
@section('content')
<div class="container card">
    <div class="row justify-content-center">
        <div class="col-md-5 py-5">
            <h1>Steal new meme</h1>
            <form class="card-body" action="/" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption:</label>
                    <input type="text" value="{{ old('caption') }}" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" required>
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="caption" class="form-label">Image:</label>
                    <input type="file" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror @error('image') is-invalid @enderror" id="image" name="image" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Original source:</label>
                    <input type="text" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror" id="author" name="author">
                    @error('author')
                        <span class="invalid-feedback" role="alert">
                                <strong>Citing the source is not allowed. Try reading the website's name.</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection