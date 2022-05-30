@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit</h1>
    </div>
    @foreach ($user as $us)
      <div class="row">
        <form action="{{ route('user.update', $us->username) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-6">
                <a href="{{ route('user.show',  $us->username) }}" class="btn btn-danger mb-4">
                    < Back</a>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" disabled placeholder="Input username here ... "  value="{{ old('username',  $us->username) }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Input name here ... "  value="{{ old('name',  $us->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                  
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Input email here ... "  value="{{ old('email',  $us->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
    @endforeach
@endsection
