@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">MyBlogPost</h1>
    </div>
    <a href="{{ route('blogpost.create') }}" class="btn btn-primary mb-3">
        <span data-feather="plus"></span>
        Add Blog
    </a>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($blogByUser as $blog)
                <tr>
                    <th scope="row">{{ $blog->title }}</th>
                    <td>
                        <a href="{{ route('blogpost.edit', $blog->slug) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('commnetmanagemnet.show', $blog->slug) }}" class="btn btn-warning">Comment
                            Management</a>
                        <form action="{{ route('blogpost.destroy', $blog->slug) }}" method="post" class="d-inline">
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('You sure delete this data ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                {{-- Cetak ketika tidak ada comment --}}
                @endforeach
                @if (count($blogByUser) == 0 )
                    <tr>
                        <td colspan="5" class="text-center"><b>Blogs is empty</b></td>
                    </tr>
                @endif
        </tbody>
    </table>
    {{ $blogByUser->links() }}
@endsection
