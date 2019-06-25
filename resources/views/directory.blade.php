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
<section id="membres">
       @forelse ($users as $user)
            <li>{{ $user->firstname }}</li>
            <li>{{ $user->lastname }}</li>
        @empty
            <p>No users</p>
        @endforelse
    <div class="ficheMembre">
        <div class="divphoto">
            <img class="photo" src="" width="">
        </div>
    <p class=""></p>
    <a href="">Voir le profil</a></div>
    
    <div id="" class='modal' aria-hidden="true" role="dialog" aria-labelledby="title_modal" style="display:none">
        <div class="modal-wrapper js-modal-stop">
            <button class="js-modal-close">Retour</button>
            <h3 id="title_modal">profil de </h3>
            <ul>
                <li>Prénom :</li>
                <li>Nom : </li>
                <li>Pseudo: </li>
                <li>Contact : <a href=""><img src=""></a></li>
                <li>Poste occupé : </li>
                <li>Entreprise actuelle : </li> 
            </ul>
        </div>
    </div>
</section>
@endsection