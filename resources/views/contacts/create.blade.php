@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prendre contact</h2>
<form action="{{route('contact')}}" method="POST">
    @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control mb-2 mt-4" required="required" placeholder="Votre nom">
            <small class="text-danger">{{ $errors->has('name') ? $errors->first('name') : null }}</small>
            <input type="email" name="mail" id="mail" class="form-control mb-2" required="required" placeholder="Votre mail">
            <small class="text-danger">{{ $errors->has('mail') ? $errors->first('mail') : null }}</small>
            <input type="text" name="object" id="object" class="form-control mb-2 mt-4" required="required" placeholder="Objet">
            <small class="text-danger">{{ $errors->has('object') ? $errors->first('object') : null }}</small>
            <textarea class="form-control" name="content" required="required" id="message" placeholder="Votre message" rows="5" cols="10"></textarea>
            <small class="text-danger">{{ $errors->has('message') ? $errors->first('message') : null }}</small>
            <button class="btn-ifa offset-md-10 mt-3">Envoyer</button>
        </div>
    </form>
</div>
@endsection

