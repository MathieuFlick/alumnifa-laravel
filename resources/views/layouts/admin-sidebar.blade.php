@extends('layouts.app')
@section('title', 'Mon compte')
@section('content')
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="{{ $user->avatar }}" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->firstname . ' ' . $user->lastname }}
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">bien</button>
					<button type="button" class="btn btn-danger btn-sm">pas bien</button>
				</div>
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
            
            @yield('subview')        </div>
	</div>
</div>
@endsection
@section('styles')
<style>
    body {
        background: #F1F3FA;
    }
    /* Profile container */
    .profile {
        margin: 20px 0;
    }
    
    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic {
        display: flex;
        justify-content: center;
    }
    
    .profile-userpic img {
        margin: 0 auto;
        width: 50%;
        height: 50%;
        border-radius: 50% !important;
    }
    
    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }
    
    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }
    
    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }
    
    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }
    
    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }
    
    .profile-usermenu {
        margin-top: 30px;
    }
    
    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }
    
    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }
    
    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }
    
    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }
    
    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }
    
    .profile-usermenu ul li.active {
        border-bottom: none;
    }
    
    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }
    
    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
</style>  
@endsection
