@extends('layouts.app')
@section('title')
	@lang('custom.password.reset')
@endsection
@section('body_content')
	<h1 class="text-center mt-5">@lang('custom.password.reset')</h1>
	<div class="row mt-5 pt-5">
		<div class="col-md-4 offset-md-4">
			<form method="POST" action="{{ route('password.request') }}">
				{{ csrf_field() }}
				<input type="hidden" name="token" value="{{ $token }}">
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
      					@if ($errors->has('password'))
	      					<div class="invalid-feedback">
	          					<span>{{ $errors->first('password') }}</span>
	        				</div>
        				@endif
    				</div>
    			</div>
    			<div class="form-row">
    				<div class="col-md-12 mb-3">
      					<label for="password-confirm">@lang('custom.password.confirm')</label>
      					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      					@if ($errors->has('password_confirmation'))
							<div class="invalid-feedback">
								<span>{{ $errors->first('password_confirmation') }}</span>
							</div>
						@endif
    				</div>
    			</div>
    			<div class="form-row">
					<div class="col-md-12 mb-3 text-center">
						<button type="submit" class="btn btn-outline-primary">@lang('custom.next')</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
