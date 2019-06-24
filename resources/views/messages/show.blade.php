@extends('layouts.app');
@section('title', 'meqssagerie')

@section('content')
<div class='container'>
    <div class="row">
        @include('messages.users',['users' => $users])
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    {{$user->firstname." ".$user->lastname}}
                    <div class='card-body conversations'>
                    </div>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
