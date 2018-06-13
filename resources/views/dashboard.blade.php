@extends('layouts.app')
@section('title')
	Dashboard
@endsection
@section('js_scripts')
	<script type="text/javascript" src="{{ asset('js/controllers/home.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/controllers/clienti.js') }}"></script>
@endsection
@section('body_content')
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
		<a class="navbar-brand js-scroll-trigger" href="#page-top">
			<span class="d-block d-lg-none">SlocFit</span>
			<span class="d-none d-lg-block">
				<img class="img-fluid img-profile rounded-circle mx-auto mb-2" ng-src="@{{ gravatar_url }}" alt="Gravatar Image">
			</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">				
				<li class="nav-item pt-1 pb-1" ng-class="{ 'active': activeMenu == 'home' }">
					<a class="nav-link js-scroll-trigger" href="#/home">
						<i class="fas fa-home pr-2"></i> Home
					</a>
				</li>
				<li class="nav-item pt-1 pb-1" ng-class="{ 'active': activeMenu == 'clienti' }">
					<a class="nav-link js-scroll-trigger" href="#/clienti">
						<i class="fas fa-users pr-2"></i> Clienti
					</a>
				</li>
				<li class="nav-item pt-1 pb-1" ng-class="{ 'active': activeMenu == 'palestra' }">
					<a class="nav-link js-scroll-trigger" href="#/palestra">
						<i class="fas fa-building pr-2"></i> Palestra
					</a>
				</li>
				<li class="nav-item pt-1 pb-1" ng-class="{ 'active': activeMenu == 'impostazioni' }">
					<a class="nav-link js-scroll-trigger" href="#/impostazioni">
						<i class="fas fa-cog pr-2"></i> Impostazioni
					</a>
				</li>
				<!--
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
				-->
			</ul>
		</div>
	</nav>
	<div class="container-fluid p-0">
		<section class="p-3 p-lg-4 d-flex flex-column">
			<h2 ng-bind="title"></h2>
			<div ng-view></div>
		</section>
	</div>
@endsection