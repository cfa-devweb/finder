@extends('layouts.app')

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <!-- col for image left-->
        <div class="col-md-6">
            <div class="card-body">
                <img src="https://dummyimage.com/640x360/fff/aaa">
            </div>
        </div>

        <!-- col for login form-->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">{{ __('Se connecter') }}</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row my-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3 justify-content-center">

                                <div class="col-md-8">
                                    <input id="password" type="password" placeholder="Mot de passe"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-check  justify-content-center">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label justify-content-center" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <div class="col-md-4 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oubliée ?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <div class="col-md-4 offset-md-4">
                                    <button type="button" class="btn btn-primary" id="target">
                                        {{ __('Connexion') }}
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
</div>
<script>

$( "#target" ).click(function() {
  alert( "Handler for .click() called." );
});
</script>
@endsection
