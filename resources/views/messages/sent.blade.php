@extends('layouts.messages-sidebar', ['users' => $users])
@section('subview')
<div class="col-md-9">
    <div class="list-group">
    <h6>Messages envoyés</h6>
    @foreach($messages as $message)
        <div class="d-inline list-group-item">
            <div class="row">
                    <a class="col-md-10"href="{{route('account.messages.sentRead', $message->message_id)}}">
                        <div class="row">
                            <p class="d-inline col-md-6">À : {{$message->firstname." ".$message->lastname}}</p>
                            <p class="d-inline col-md-6">Objet : {{$message->objet}}</p>
                        </div>
                    </a>
                <p class="d-inline col-md-2"><a href="{{route('account.messages.sentDelete', $message->message_id)}}"><i class="fas fa-trash-alt"></i></a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

