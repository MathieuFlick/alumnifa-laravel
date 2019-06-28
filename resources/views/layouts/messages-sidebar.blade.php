@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class='container'>
    <div class='row'>
        <a class="col-md-4" href ={{route('messages.write')}}><button type="button" class="btn btn-primary">Nouveau message</button></a>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="accordion" id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h6 class="mb-0">
                            <a href="{{route('messages.sent')}}">Messages envoyés</a>
                            <button class ="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Contacts</button>
                        </h6>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($users as $user)
                                <a class="list-group-item" href="{{route('messages.conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('subview')
    </div>
</div>

@endsection
