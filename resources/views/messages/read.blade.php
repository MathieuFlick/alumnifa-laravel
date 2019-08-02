@extends('layouts.messages-sidebar', ['users' => $users])
@section('subview')
<div class="col-md-9">
    <div class="col-md-9 list-group">
        <div>
            <p>De : {{$message->firstname . " " . $message->lastname}}</p>
            <p>Objet : {{$message->objet}}</p>
            <p>{{$message->body}}</p>
        </div>
    </div>
</div>
@endsection
