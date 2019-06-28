@extends('layouts.messages-sidebar', ['users' => $users])
@section('title', 'Lecture d\'un message')
@section('subview')
<div class="col-md-9">
    <div class="list-group">
    <h6>Boite de réception</h6>
    @foreach($messages as $message)
        <div class="d-inline list-group-item">
            <div class="row">
                @if($message->read == false)
                    <a class="col-md-10"href="{{route('read', $message->message_id)}}">
                        <p class="d-inline mr-5 font-weight-bold">De : {{$message->firstname." ".$message->lastname}}</p>
                        <p class="d-inline ml-5 font-weight-bold">Objet : {{$message->objet}}</p>
                    </a>
                @else
                <a class="col-md-10"href="{{route('read', $message->message_id)}}">
                        <p class="d-inline mr-5">De : {{$message->firstname." ".$message->lastname}}</p>
                        <p class="d-inline ml-5">Objet : {{$message->objet}}</p>
                    </a>
                @endif
        <p class="d-inline col-md-2"><a href="{{route('deleteMessage', $message->message_id)}}"><i class="fas fa-trash-alt"></i></a></p>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
