@extends('layouts.app')
@section('title', 'Mes informations')
@section('content')
<div class="form-group">
    <form method="post" action=''>
        @csrf
        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder='Entrez votre email'>
        <small class="text-danger">{{ $errors->has('email') ? $errors->first('email') : null }}</small>
        
        <input type="text" name="city" class="form-control" placeholder='Ville de résidence'>
        <small class="text-danger">{{ $errors->has('city') ? $errors->first('city') : null }}</small>
        
        <input type="text" name="street" class="form-control" placeholder="Rue">
        <small class="text-danger">{{ $errors->has('street') ? $errors->first('street') : null }}</small>
        
        <input type="number" name="postcode" class="form-control" placeholder="Code postal">
        <small class="text-danger">{{ $errors->has('postcode') ? $errors->first('postcode') : null }}</small>
        
        <input type="number" name="number" class="form-control" placeholder="Numéro de rue">
        <small class="text-danger">{{ $errors->has('number') ? $errors->first('number') : null }}</small>
        
        <input type="text" name="company" class="form-control" placeholder="Employeur">
        <small class="text-danger">{{ $errors->has('company') ? $errors->first('company') : null }}</small>
        
        <input type="text" name="post" class="form-control" placeholder="Poste occupé">
        <small class="text-danger">{{ $errors->has('post') ? $errors->first('post') : null }}</small>
        
        <input type="password" name="password" class="form-control" placeholder='Entrez votre nouveau mot de passe'>
        <small class="text-danger">{{ $errors->has('password') ? $errors->first('password') : null }}</small>
        
        <input type="password" name="password_confirmation" class="form-control" placeholder='Confirmez votre nouveau mot de passe'>
        <small class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirm') : null }}</small>
        
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
</div>
@endsection
