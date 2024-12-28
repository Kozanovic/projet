@extends('layouts.app')

@section('title') Index @endsection
@section('content')
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
        {{-- @dd($posts) --}}
        <table class="table mt-2 mx-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</</td>
                        <td>{{$post->user ? $post->user->name : 'Not Found'}}</</td>
                        <td>{{$post->created_at}}</</td>
                        <td>
                            <a href='{{route('posts.show' , $post->id)}}' class="btn btn-info">View</a>
                            <a href='{{route('posts.edit' , $post->id)}}' class="btn btn-primary">Edit</a>
                            <form method="POST" style="display: inline" onsubmit="return confirmDelete()" action="{{route('posts.destroy' , $post->id)}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <script>
                  function confirmDelete() {
                      return confirm('Voulez-vous vraiment supprimer ce post ?');
                  }
              </script>
            </tbody>
          </table>
@endsection