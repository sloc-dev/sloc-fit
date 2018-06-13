@extends('layouts.app')
@section('title')
	Recupero password
@endsection
@section('body_content')
	<h1 class="text-center mt-5">Recupero password</h1>
	<div class="row mt-5 pt-5">
		<div class="col-md-4 offset-md-4">
			<form method="POST" action="{{ route('password.email') }}">
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
					<div class="col-md-12 mb-3 text-center">
						<button type="submit" class="btn btn-outline-primary">Conferma</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
