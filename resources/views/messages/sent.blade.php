@extends('layouts.messages-sidebar', ['users' => $users])
@section('subview')
<div class="col-md-9">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Destinataire</th>
            <th scope="col">Objet</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                @if($message->read == false)
                    <tr onclick="clickedRow({{$message->message_id}})" class="row-hover">
                        <td>{{$message->firstname." ".$message->lastname}}</td>
                        <td>{{$message->objet}}</td>
                        <td><a href="{{route('messages.sentDelete', $message->message_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
function clickedRow(i) {
    return window.location.href = '/messages/read/'+i
}
</script>
@endsection
@section('styles')
<style>
.row-hover {
    cursor: pointer;
}
.table-hover tbody tr:hover {
    background-color: rgb(160,160,160,0.1)
}
.fa-trash-alt {
    color: #f47801;
}
</style>
@endsection

