@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="position-absolute top-50 start-50 translate-middle" style="margin-top: 100px!important;">
        <div class="card shadow-lg rounded" style="margin-bottom: 200px !important;width: 20rem;">
            <div class="col">
                <div class="col-md-4" style="margin-left:-15px;border: 5px solid !important; background-color:#206a96; color: #206a96; width:40px; height: 15px; margin-left: auto; ">
                    <div class="row">
                    </div>
                </div>
                <strong>
                    <h2 class="mt-3 ms-2" style="color: #206a96; font-size: 40px;">Login</h2>
                </strong>
            </div>

            <div class="container mb-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mt-3">
                        <label class="ms-2" for="email">{{ __('E-Mail Address') }}</label>
                        <div class="shadow-lg rounded">
                            <input style="outline:none;" id="email" placeholder="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="ms-2" for="password" class="">{{ __('Password') }}</label>
                        <div class="shadow-lg rounded">
                            <input style="outline:none" id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="form-group mt-4">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>


</div>
@endsection