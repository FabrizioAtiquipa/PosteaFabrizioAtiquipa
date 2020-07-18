@extends('layouts.app')

@section('content')
<div class="container">
    @auth
            <div class="container">
              <a href="{{ action('PostController@userPosts')}}"><button type="button" class="btn btn-info">Mis publicaciones</button></a>
            <p> </p> 
    @endauth
    @foreach($publicaciones as $publicacion)
    <div class="row md-4 justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card card-body">
                    <h5 class="card-title">
                        <a href="{{action('PostController@show', $publicacion->id)}}">{{$publicacion->title}}</a>
                    </h5>
                </div>
                <img src="{{asset($publicacion->image)}}" class="card-img-top" alt="...">
                <p></p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row md-4 justify-content-md-center">
    <p><FONT COLOR="white"> Numero de publicaciones: {{ $publicaciones->count() }}- </FONT></p>
    <p><FONT COLOR="white"> Usted se encuentra en la pagina: {{ $publicaciones->currentPage() }}- </FONT> </p>
    <p><FONT COLOR="white"> Cantidad de publicaciones: {{ $publicaciones->total() }}</FONT></p>
    </div>
    <div class="row md-4 justify-content-md-center">
    {{$publicaciones->links()}}
    </div>
</div>
@endsection