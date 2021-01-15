@extends('layouts.app')

<link rel="stylesheet" href="{{ mix('css/ippopup.css') }}">

<div class="modal fade" id="registro" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="ippopup-modal-content modal-content ">
            <div class="modal-body">   
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                        <h4 class="nunito-bold">Informacion personal</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 text-white">{{ __('Name') }}</label>

                                <div class="col-sm-offset-4 col-sm-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror personalInfo inner-shadow" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 text-white">{{ __('E-Mail Address') }}</label>

                                <div class="col-sm-offset-4 col-sm-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror personalInfo inner-shadow" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 text-white">{{ __('Password') }}</label>

                                <div class="col-sm-offset-4 col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror personalInfo inner-shadow" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-sm-4 text-white">{{ __('Confirm Password') }}</label>

                                <div class="col-sm-offset-4 col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control personalInfo inner-shadow" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <img class="d-sm-none d-md-block" src="{{ asset('svg/informacion-personal.svg') }}"
                                alt="info-personal"> 
                        </div>
                    </div>
                    
                     
                </form>  
            </div>
        </div>
    </div>
</div>

<script>
    function showRegistroModal() {  
        $('#registro').modal('show'); 
    }
</script>