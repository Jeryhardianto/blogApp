@extends('frontend.layout.main')
@section('content')


<div class="container">
    <div class="row d-flex mt-5">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <form action="{{ route('login.dologin') }}" method="post">
                        @csrf
                        <h2 style="text-align: center">Sign In</h2>
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger " role="alert">
                            {{ session('loginError') }}
                        </div>
                        @endif
                        <div class="form-floating  mb-4">
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                placeholder="Email or Username" />
                            <label for="username">Username </label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror mt-3"
                                value="{{ old('password') }}" placeholder="Password" />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 mt-4 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Login</button>
                        </div>
                      </form>
                      
    
                </div>
              </div>
            
         
        </div>
        <div class="col-4">
          
            
         
        </div>
    </div>
</div>
    @endsection
