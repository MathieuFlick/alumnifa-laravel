@extends('layouts.messages-sidebar', ['users' => $users])
@section('subview')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            {{$reply->firstname." ".$reply->lastname}}
            <div class='card-body conversations'>
                <form method="POST">
                    @csrf   
                    <div class="form-group">
                        <input type="text" name="object" class="form-control" placeholder='objet'>
                        <textarea name="content" placeholder="Écrivez votre message" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </form>
            </div>.
        </div>
    </div>
</div>
@endsection
