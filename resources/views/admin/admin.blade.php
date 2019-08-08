@extends('layouts.admin-sidebar')
@section('subview')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Suppression</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->lastname}}</td>
      <td>{{$user->firstname}}</td>
      <td><a href="{{route('deleteUser', $user->id)}}"><i class="fas fa-times"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
