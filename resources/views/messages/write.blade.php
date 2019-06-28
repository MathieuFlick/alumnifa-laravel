@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class='container'>
    <div class='row'>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <h6>Contact</h6>
                @foreach($users as $user)
                    <a class="list-group-item" href="{{route('conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <form>
                @csrf
                <input type="hidden" id="recipient_id" name="recipient_id">
                <input type="text" class="form-control" id="recipient" name="recipient"  placeholder="Entrez ici le destinataire du message">
                <input type="text" class="form-control" id="object" name="object"  placeholder="Objet">
                <textarea name="content" placeholder="Écrivez votre message" rows="5"class="form-control mt-5"></textarea>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
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
