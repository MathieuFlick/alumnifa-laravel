@extends('layouts.app')
@section('title', 'Annuaire')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <form id="form_recherche" class="d-flex align-items-center" method="POST">
        @csrf
        <input type="text" name="name" id="recherche" class="form-control mr-3" style="width:200px;" placeholder="Rechercher">
        <div class="form-group mr-3 mb-0">
            <select id="selectPromo" name="promo" class="form-control">
                <option value selected disabled>Promotion</option>
            </select>
        </div>
        <div class="form-group mb-0 mr-3">
            <select id="selectYear" name="year" class="form-control">
                <option value selected disabled>Année</option>
            </select>
        </div>
        <button class="btn"><i class="fas fa-search"></i></button>
    </form>
    <a href="{{route('directory')}}" class="btn btn-light orange">Réinitialiser</a>
</div>
<div id="membres">
    <div class="card-list">
        @forelse ($users as $user)
            <div class="card bg-dark text-white" data-toggle="modal" data-target="#info-{{ $user->id }}">
                <img class="card-img-top" src="{{ asset('images/profil/'.$user->id.'.JPG') }}">
                <h5 class="card-title">{{ $user->firstname }} {{ $user->lastname }}</h5>
            </div>
        @empty
            <div class="alert alert-danger">1, 2, 3 il n'y à rien par là</div>
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
                        <h3 class="modal-title" id="exampleModalLabel">{{ $user->firstname }} {{ $user->lastname }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img class="card-img-top photo" src="{{ asset('images/profil/'.$user->id.'.JPG') }}" alt="{{ $user->pseudo }}">
                                </div>
                                <div class="col">
                                    <ul class="limodal">
                                        <li>Pseudonyme : {{ $user->pseudo }}</li>
                                        <li>Date de naissance : {{ $user->dob->format('d/m/Y') }}</li>
                                        <li>Promotion : {{ $user->promo }}</li>
                                        <li>Entreprise actuelle : {{ $user->company }}</li>
                                        <li>Poste occupé : {{ $user->post }}</li>
                                        <li>Contact : <a href="{{route('messages.conversations', $user->id)}}"><img src="{{ asset('images/send.svg') }}"></a></li>
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

@section('scripts')
<script>
    let names = [];
    fetch('/directory/autocomplete').then(response => {
        return response.json()
    }).then(json => {
        for (let i = 0; i < json.length; i++) {
            names.push(json[i])
        }
    })
    $('#recherche').autocomplete({
        source: names,
        focus: function( event, ui ) {
            $("#recherche").val(ui.item.label);
            return false;
        },
        select: function( event, ui ) {
            $('#recherche').val(ui.item.label)
            return search();
        }
    })
    function search() {
        $('#form_recherche').submit();
    }

    fetch('/directory/years').then(res => {
        return res.json();
    }).then(data => {
        for (let i = 0; i < data.length; i++) {
            const element = data[i];
            $('#selectYear').append('<option value="'+element+'">'+element+'</option>');
        }
    })
    fetch('/directory/promo').then(res => {
        return res.json();
    }).then(data => {
        for (let i = 0; i < data.length; i++) {
            const element = data[i];
            $('#selectPromo').append('<option value="'+element+'">'+element+'</option>');
        }
    })

</script>
@endsection

@section('styles')
<style>
.card-list{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-bottom: 1%;
}
.card{
    width:200px;
    margin-top: 1%;
    text-align: center;
}
.card-title{
    background-color: #282828;
    padding-top: 2px;
    padding-bottom: 6px;
    margin-bottom: 0;
}
.photo{
    border-radius: 100%;
    border: #f47801 solid 6px;
}
.grey{
    background-color: #282828;
    color: white;
}
.side{
    width: 800px;
}
.orange{
    border:none;
    background-color: #f47801;
}
.orange:hover{
    background-color: #white;
}
.limodal{
    list-style: none;
    margin-top: 18%;
    margin-left: 8%;
}
ul.limodal li{
    margin-bottom: 5%;
}

.bg-dark{
    background-color : red;
}
</style>
@endsection