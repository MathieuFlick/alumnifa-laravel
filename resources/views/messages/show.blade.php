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
                        <form action="" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="content" placeholder="Écrivez votre message"
                                class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                        </form>
                    </div>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
