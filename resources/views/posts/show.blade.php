@extends('layouts.app')

@section('title') Show @endsection
@section('content')
        <div class="card">
            <div class="card-header">
              Post info
            </div>
            <div class="card-body">
              <h5 class="card-title">title : {{$post->title}}</h5>
              <p class="card-text">description : {{$post->description}}</p>
            </div>
          </div>

        <div class="card">
            <div class="card-header">
              Post Creator info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name : {{$post->user ? $post->user->name : 'Not Found'}}</h5>
              <p class="card-text">Email : {{$post->user ? $post->user->email : 'Not Found'}}</p>
              <p class="card-text">Created At : {{$post->user ? $post->user->created_at : 'Not Found'}}</p>
            </div>
          </div>
@endsection