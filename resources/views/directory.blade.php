@extends('layouts.app')
@section('title', 'Annuaire')
@section('content')
<div class="d-flex justify-content-between">
    <div>
        <form id="form_recherche" method="POST">
            @csrf
            <input type="text" name="search" id="recherche" placeholder="Rechercher dans l'annuaire">
            <div class="form-group">
            <select id="selectYear" class="form-control">
                <option value="">Choix promotion</option>
                @for ($i = 1986; $i <= date('Y'); $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>

            </div>
        </form>
    </div>
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
    let data = [];
    fetch('/directory/autocomplete').then(response => {
        return response.json()
    }).then(json => {
        for (let i = 0; i < json.length; i++) {
            data.push(json[i])
        }
    })

    $('#recherche').autocomplete({
        source: data,
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

    $('#selectYear').change(function(e) {
        let year = e.target.value

        window.location.href = '/directory/'+ year
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
