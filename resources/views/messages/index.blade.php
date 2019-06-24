@extends('layouts.app');
@section('title', 'meqssagerie')

@section('content')
<div class='container'>
    @include('messages.users',['users' => $users])
</div>
@endsection
