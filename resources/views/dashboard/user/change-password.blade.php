@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Change Password</h1>
    </div>

      <div class="row">
        <form action="{{ route('changepassword.update',$username) }}" method="post">
            @method('put')
            @csrf
            <div class="col-6">
                <a href="{{ route('user.show',  $username) }}" class="btn btn-danger mb-4">
                    < Back</a>
                    <div class="mb-3">
                        <label for="currentpassword" class="form-label">Current Password</label>
                        <input type="password" name="currentpassword" class="form-control @error('currentpassword') is-invalid @enderror"
                            id="currentpassword"  placeholder="Input current password here ... "  >
                        @error('currentpassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Passowrd</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" placeholder="Input new passowrd here ... ">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                  
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confrim Password</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password" placeholder="Input Confrim Password here ... ">
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            </div>
            <button class="btn btn-primary" type="submit">Change Password</button>
        </form>
    </div>
   
@endsection
