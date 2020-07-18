@extends('layouts.app')

@section('content')
<div class="container">
    <h1>A continuación, las publicaiones del día actual</h1>
    @foreach( $posts as $post)
    <div class="row mb-6 justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">                        
                        <a href="{{ action('PostController@show', $post->id) }}">{{ $post->title }}</a>
                        <h6>Publicado el : {{$today}}</h6>
                    </h5>
                </div>
                <img src="{{ asset($post->image) }}" class="card-img-top" alt="...">
                <h6 class="card-title">
                        {{ $post->content }}
                </h6>
            </div>
        </div>
    </div>
    @endforeach 
</div>
@endsection