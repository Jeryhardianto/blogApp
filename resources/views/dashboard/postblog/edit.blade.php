@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Blog</h1>
    </div>
    <div class="row">
        <form action="{{ route('blogpost.update', $blog->slug) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-6">
                <a href="{{ route('blogpost.index') }}" class="btn btn-danger mb-4">
                    < Back</a>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                            <input type="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" placeholder="Input title here ... " value="{{ old('title', $blog->title) }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if ($blog->image)
                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                    src="{{ asset('storage/' . $blog->image) }}" > 
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $blog->body) }}">
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
    <script>
        function previewImage() {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.querySelector('.img-preview');
                output.style.display = 'block';
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
