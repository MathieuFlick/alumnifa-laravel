@extends('layouts.messages-sidebar', ['users' => $users])
@section('subview')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            {{$reply->firstname." ".$reply->lastname}}
            <div class='card-body conversations'>
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="object" class="form-control" placeholder='objet'>
                        <small class="text-danger">{{ $errors->has('object') ? $errors->first('object') : null }}</small>
                        <textarea name="content" placeholder="Écrivez votre message" class="form-control"></textarea>
                        <small class="text-danger">{{ $errors->has('content') ? $errors->first('content') : null }}</small>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </form>
            </div>.
        </div>
    </div>
</div>
@endsection
