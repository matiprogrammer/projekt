@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset hasła') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/users/reset">
                            @csrf

                            <div class="form-group row">
                                <label for="curPassword"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Aktualne hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="curPassword" type="password" class="form-control" name="curPassword"
                                        required autofocus>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nowe hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control  name=" password" required
                                        autocomplete="new-password">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Powtórz nowe hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <strong>{{ $errors }}</strong>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Resetuj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
