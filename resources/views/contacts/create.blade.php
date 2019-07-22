@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prendre contact</h2>
<form action="{{route('contact')}}" method="POST">
    @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Votre nom">
            <small class="text-danger">{{ $errors->has('name') ? $errors->first('name') : null }}</small>
            <input type="email" name="mail" id="mail" class="form-control" required="required" placeholder="Votre mail">
            <small class="text-danger">{{ $errors->has('mail') ? $errors->first('mail') : null }}</small>
            <textarea class="form-control" name="message" required="required" id="message"  rows="5" cols="10"></textarea>
            <small class="text-danger">{{ $errors->has('message') ? $errors->first('message') : null }}</small>
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection