@extends('dashboard.layout.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commnet Management</h1>
    </div>
    <a href="{{ route('blogpost.index') }}" class="btn btn-danger mb-4">
        < Back</a>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Waktu</th>
                <th scope="col">Isi Comment</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

          @foreach ($comment as  $cm)
          <tr>
              <th scope="row">{{ $cm->name }}</th>
              <th scope="row">{{ $cm->email }}</th>
              <th scope="row">{{ $cm->created_at->diffForHumans() }}</th>
              <th scope="row">{{ $cm->comment }}</th>
              <td>
                <form action="{{ route("commnetmanagemnet.destroy", $cm->id) }}" method="post" class="d-inline">
                  <input type="hidden" name="id" value="{{ $cm->id }}">
                  <input type="hidden" name="slug" value="{{ $slug }}">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('You sure delete this data ?')">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
          {{-- Cetak ketika tidak ada comment --}}
          @if(count($comment) == 0 )
            <tr>
                <td colspan="5" class="text-center"><b>Comment is empty</b></td>
            </tr>
         @endif
        </tbody>
      </table>

    {{ $comment->links() }}
@endsection
