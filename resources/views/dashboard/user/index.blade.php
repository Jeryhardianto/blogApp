
@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">MyBlogPost</h1>
    </div>
    <div class="card" style="width: 20rem;">
        <img src="https://www.logolynx.com/images/logolynx/5c/5c5fbe66daa900ad13c9a0046596c465.png" class="card-img-top" alt="...">
        <div class="card-body mt-4" >
            @foreach ($user as $us)
            
            <h5 class="card-title">{{ $us->name  }}</h5>
            <h6 class="card-title">{{ $us->username }}</h6>
            <h6 class="card-title">{{ $us->email  }}</h6>
           
            <a href="{{ route('user.edit',  $us->username) }}" class="btn btn-primary mt-4">Edit</a>
            <a href="{{ route('changepassword.show', $us->username) }}" class="btn btn-primary mt-4">Change Password</a>
            @endforeach
        </div>
      </div>
@endsection
