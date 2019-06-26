@extends('layouts.app')
@section('title', 'Annuaire')
@section('content')
<div id="recherche">
    <form>
        <input id="reinit" class="submit_recherche" type="submit" value="Voir tous les membres" name="reinit">
    </form>
    <form id="form_recherche" method="POST">
        <input id="input_recherche" type="text" name="search" id="recherche" placeholder="Rechercher dans l'annuaire" >
        <input class="submit_recherche" type="submit" value="Rechercher" name="submit">
    </form>
</div>
<div id="membres">
    <div class="card-list">
        @forelse ($users as $user)
            <div class="card" data-toggle="modal" data-target="#info-{{ $user->id }}">
                <img class="card-img-top" src="{{ asset('images/profil/'.$user->id.'.JPG') }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->firstname }} {{ $user->lastname }}</h5>
                </div>
            </div>
        @empty
            <p>No users</p>.
        @endforelse
    </div>
</div>
@endsection

@section('modals')
    @foreach ($users as $user)
        <div class="modal fade" id="info-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content side">
                    <div class="modal-header grey">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $user->firstname }} {{ $user->lastname }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img class="card-img-top photo" src="{{ asset('images/profil/'.$user->id.'.JPG') }}">
                                </div>
                                <div class="col">
                                    <ul>
                                        <li>Pseudonyme: {{ $user->pseudo }}</li>
                                        <li>Promotion: </li>
                                        <li>Entreprise actuelle : </li>
                                        <li>Poste occupé : </li>
                                        <li>Contact : <a href=""><img src="{{ asset('images/send.svg') }}"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer grey">
                        <button type="button" class="btn btn-light orange" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('styles')
<style>
.card-list{
    display: flex;
    justify-content: space-around;
}
.card{
    max-width: 200px;
}
.photo{
    border-radius: 100%;
    border: #f47801 solid 0.255em;
}
.grey{
    background-color: #282828;
    color: white;
}
.side{
    width: 800px;
}
.orange:hover{
    background-color: #f47801;
}
</style>
@endsection