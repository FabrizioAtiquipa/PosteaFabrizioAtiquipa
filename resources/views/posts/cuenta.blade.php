@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar datos') }}</div>

                <div class="card-body">
                    <form action="{{ action('UserController@update') }}" method="PUT" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                        <input id="id" name="id" value="{{ $user['id']}}" type="hidden">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{!!  $user->name !!}" required >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="mew-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-block"> 
                                    {{ __('Editar') }}
                                </button>
                            </div>
                            <br><br>                           
                        </div>
                    </form>

                    <div class="col-md-6 offset-md-4">
                        <form action="{{ action('UserController@delete') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input id="id" name="id" value="{{ $user['id']}}" type="hidden">
                            <div>
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-danger btn-block">Eliminar cuenta</button>
                            </div>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection