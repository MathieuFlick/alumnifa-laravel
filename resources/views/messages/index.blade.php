@extends('layouts.messages-sidebar', ['users' => $users])
@section('title', 'Lecture d\'un message')
@section('subview')
<div class="col-md-9">
    <div class="list-group">
    <h6>Boite de réception</h6>
    @foreach($messages as $message)
        <div class="d-inline list-group-item">
            <div class="row">
                <a class="col-md-10"href="{{route('read', $message->message_id)}}">
                <p class="d-inline mr-5">De : {{$message->firstname." ".$message->lastname}}</p>
                <p class="d-inline ml-5">Objet : {{$message->objet}}</p>
            </a>
                <p class="d-inline col-md-2"><i class="fas fa-trash-alt"></i></p>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
