@php
use Carbon\Carbon;
@endphp
@extends('frontend.layout.main')
@section('content')
    <div class="row">
        <div class="col mt-3">
            <h1 class="mb-4">{{ $blogx->title }}</h1>
            <i class="bi bi-person-circle"></i> <small>{{ $blogx->author->username ?? ''}}</small>
            <div class="clearfix">
                <img src="{{ asset('storage/' . $blogx->image) }}" class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">
                <p style="text-align: justify">
                    {!! $blogx->body !!}
                </p>
              </div>
            <div class="d-grid gap-2 mt-4 d-md-flex justify-content-md-end">
                <p class="small text-muted mb-0">{{ $waktuPost }}</p>
            </div>
            <a class="text-decoration-none" href="/"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
            <div class="row d-flex mt-5">
                <div class="col">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                        <div class="card-body p-4">
                            <form action="{{ route('comment.store') }}" method="post">
                                @csrf
                                <div class="form-floating  mb-4">
                                    <input type="hidden" name="slug" value="{{ $blogx->slug }}" />
                                    <input type="hidden" name="id_blog" value="{{ $blogx->id }}" />
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="Name" />
                                    <label for="name">Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror mt-3"
                                        value="{{ old('email') }}" placeholder="Email" />
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <textarea name="comment" id="addANote" class="form-control @error('comment') is-invalid @enderror mt-3"
                                        value="{{ old('comment') }}" placeholder="Type comment..."></textarea>
                                    <label for="comment">Comment</label>
                                    @error('comment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 mt-4 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="submit"><i
                                            class="bi bi-send-plus-fill"></i> Send</button>
                                </div>
                              </form>
                                {{ $comments->links() }}
                                @foreach ($comments as $com)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>{{ $com->comment }}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <i class="bi bi-person-circle"></i>
                                                    <p class="small mb-0 ms-2">{{ $com->name }}</p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    @php
                                                        $create_at = DB::select('SELECT created_at FROM comments WHERE id = ?', [$com->id]);
                                                        $dateTime = $create_at[0]->created_at;
                                                        $waktuComment = Carbon::parse($dateTime)
                                                            ->locale('id')
                                                            ->diffForHumans(['options' => 0]);
                                                    @endphp
                                                    <p class="small text-muted mb-0">{{ $waktuComment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(count($comments) == 0 )
                                <h1><i><b>Comment is empty</b></i></h1>
                                @endif
        
                        </div>
                      </div>
                    
                 
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
