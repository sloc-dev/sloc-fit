@extends('layouts.app')
@section('title')
	Accedi
@endsection
@section('body_content')
	<style type="text/css">
		body { padding: 0; }
	</style>
	<h3 class="text-center mt-5">Accedi</h3>
    <div class="row mt-5 pt-5">
		<div class="col-md-4 offset-md-4">
			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<div class="form-row">
    				<div class="col-md-12 mb-3">
      					<label for="email">Email</label>
      					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      					@if ($errors->has('email'))
	      					<div class="invalid-feedback">
	          					<span>{{ $errors->first('email') }}</span>
	        				</div>
        				@endif
    				</div>
    			</div>
    			<div class="form-row">
    				<div class="col-md-12 mb-3">
      					<label for="password">Password</label>
      					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      					<small id="passwordHelpBlock" class="form-text text-muted text-right">
  							<a href="{{ route('password.request') }}">Hai perso la password?</a>
						</small>
      					@if ($errors->has('password'))
	      					<div class="invalid-feedback">
	          					<span>{{ $errors->first('password') }}</span>
	        				</div>
        				@endif
    				</div>
    			</div>
    			<div class="form-row">
					<div class="col-md-12 mb-3">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ricorda
							</label>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3 text-center">
						<button type="submit" class="btn btn-outline-primary">Accedi</button>
					</div>
				</div>
				<hr>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<a class="btn btn-block btn-facebook" href="/login/facebook"><i class="fab fa-facebook-f"></i> Accedi con Facebook</a>
						<a class="btn btn-block btn-google" href="/login/google"><i class="fab fa-google"></i> Accedi con Google</a>
					</div>
				</div>
			</form>
        </div>
    </div>
@endsection
