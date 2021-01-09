
@extends('layouts.app')



@section('content')
<form action="/p" enctype="multipart/form-data" method="POST">
    @csrf
    <h1>Add new Post</h1>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="caption" 
                class="col-md-4 col-form-label text-md-right">
                Post caption</label>

                <div class="col-md-6">
                    <input 
                        id="caption" type="text" name="caption"
                        class="form-control @error('caption') is-invalid @enderror" 
                        value="{{ old('caption') }}" 
                        required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="image" 
                    class="col-md-4 col-form-label text-md-right">
                    Paste Image</label>

                    <input class="file-control-file" type="file" name="image" id="image">

                    <div class="row pt-4">
                        <button class="btn btn-primary">Add post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection