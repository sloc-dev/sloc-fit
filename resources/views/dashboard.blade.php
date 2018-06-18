@extends('layouts.app')
@section('title')
	Dashboard
@endsection
@section('js_scripts')
	<script type="text/javascript" src="{{ asset('js/controllers/home.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/controllers/clienti.js') }}"></script>
@endsection
@section('body_content')
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">SlocFit</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item" ng-class="{ 'active': activeMenu == 'home' }">
						<a class="nav-link" href="#/home">Home</a>
					</li>
					<li class="nav-item" ng-class="{ 'active': activeMenu == 'clienti' }">
						<a class="nav-link" href="#/clienti">Clienti</a>
					</li>
					<li class="nav-item" ng-class="{ 'active': activeMenu == 'palestra' }">
						<a class="nav-link" href="#/palestra">Palestra</a>
					</li>
					<li class="nav-item" ng-class="{ 'active': activeMenu == 'impostazioni' }">
						<a class="nav-link" href="#/impostazioni">Impostazioni</a>
					</li>				
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="user-avatar rounded-circle" ng-src="@{{ gravatar_url }}" alt="Gravatar Image">
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Esci</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-5 pt-4" ng-view></div>
@endsection
