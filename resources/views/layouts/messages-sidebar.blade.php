@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class='container'>
    <div class='row'>
        <a class="col-md-4 mb-4" href ={{route('messages.write')}}><button type="button" class="btn-ifa">Nouveau message</button></a>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="accordion" id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h6 class="mb-0">
                            <p><a class="text-dark" href="{{route('messages.sent')}}">Messages envoyés</a></p>
                            <p><a class="text-dark" href="{{route('messages.index')}}">Messages reçus</a></p>
                            <p><button class ="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Contacts</button></p>
                        </h6>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($users as $user)
                                <a class="list-group-item text-dark" href="{{route('messages.conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
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

