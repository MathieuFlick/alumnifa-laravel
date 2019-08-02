@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class='container'>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <h5>Contact</h5>
                @foreach($users as $user)
                    <a class="list-group-item text-dark" href="{{route('messages.conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <div class='card-header'>
                <form class="form-group" method="POST">
                    @csrf
                    <input type="hidden" id="recipient_id" name="recipient_id">
                    <input type="text" class="form-control mb-1" id="destinataire" name="destinataire" placeholder="Entrez ici le destinataire du message">
                    <small class="text-danger">{{ $errors->has('destinataire') ? $errors->first('destinataire') : null }}</small>
                    <input type="text" class="form-control" id="object" name="object" placeholder="Objet">
                    <small class="text-danger">{{ $errors->has('object') ? $errors->first('object') : null }}</small>
                    <textarea name="content" placeholder="Écrivez votre message" rows="5" class="form-control mt-5"></textarea>
                    <small class="text-danger">{{ $errors->has('content') ? $errors->first('content') : null }}</small>
                    <button class="btn-ifa  offset-md-10 mt-3" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let autocomplete = [];
    fetch('/messages/autocomplete').then(response => {
        return response.json()
    }).then(data => {
        for (let i = 0; i < data.length; i++) {
            autocomplete.push(data[i])
        }
    })
    $('#recipient').autocomplete({
        source: autocomplete,
        focus: function( event, ui ) {
            $("#recipient").val(ui.item.label);
            return false;
        },
        select: function( event, ui ) {
            $('#recipient').val(ui.item.label)
            $('#recipient_id').val(ui.item.value)

            return false
        }
    })
</script>
@endsection
