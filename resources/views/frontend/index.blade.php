@extends('frontend.layout.main')
@section('content')

        <div class="row">
            {{ $blogs->links() }}
            @foreach ($blogs as $bg)
            <div class="col mt-3">
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('storage/' . $bg->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                        <a href="{{ route('blog.show', $bg->slug) }}" class="text-decoration-none"><h5 class="card-title">{{ $bg->title }}</h5></a>   
                        <p class="card-text" style="text-align: justify">{{ $bg->excerpt }}</p>
                        <button type="button" class="btn btn-primary position-relative">
                            comment
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             @php
                                 $comment = DB::select("SELECT COUNT(id) as jumlahcomment FROM comments WHERE id_blog = ?", [$bg->id]);
                             @endphp
                             {{ $comment[0]->jumlahcomment }}
                          
                            </span>
                        </button>
                        <div>
                            <small>{{ $bg->created_at->diffForHumans() }}</small>
                            <i class="bi bi-person-circle"></i> <small>{{ $bg->author->username ?? ''}}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @if(count($blogs) == 0 )
               <h1><i><b>Blogs is empty, input your blog</b></i></h1>
         @endif
        </div>
    @endsection
