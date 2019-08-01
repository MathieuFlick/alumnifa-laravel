@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Bonjour {{$user->firstname}} !</p>

                </div>
                <div>
                    <a href="{{route('account.editView')}}">Editez votre profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
