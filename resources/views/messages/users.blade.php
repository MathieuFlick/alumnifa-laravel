<div class="col-md-3">
        <div class ="list-group">
            @foreach($users as $user)
                <a class="list-group-item" href="{{route('conversations', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a>
            @endforeach
        </div>
    </div>
