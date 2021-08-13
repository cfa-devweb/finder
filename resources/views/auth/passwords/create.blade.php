<!-- @php
$header = false;
$footer = false;
@endphp -->

@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('auth.create-password') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">
              <input type="hidden" name="email" value="{{ $email }}">


              <div class="form-group row my-3">

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                <div class="col-md-6">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('auth.email-address') }} *" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              </div>

              <div class="form-group row my-3">

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              
              </div>

              <div class="form-group row my-3">

                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmez le mot de passe') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

              </div>

              <div class="form-group row mb-0 justify-content-center">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('auth.create-password') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
