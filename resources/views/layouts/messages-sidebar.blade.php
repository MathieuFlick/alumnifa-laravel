@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class='container'>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <h6>Contact</h6>
                @foreach($users as $user)
                    <a class="list-group-item" href="{{route('conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
                @endforeach
            </div>
        </div>
        @yield('subview')
    </div>
</div>
@endsection
