@extends('layouts.app')

@section('content')
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #1dc8cd, #1dc9cd, rgba(29, 224, 153, 0.8), rgba(29, 200, 205, 0.8));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #1dc8cd, #1dce9f, rgba(29, 224, 153, 0.8), rgba(29, 200, 205, 0.8));
    }


    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

</style>

<body class="h-100 gradient-form" >
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                                <img
                                    src="assets/img/ic_launcher.png"
                                    style="width: 185px;" alt="logo">
                                <h4 class="mt-1 mb-5 pb-1">The Footticks Team</h4>
                            </div>
                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <p>Create your account</p>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="firstname">Firstname</label>

                                    <input id="firstname" type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname"
                                           value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="lastname">Lastname</label>

                                    <input id="lastname" type="text"
                                           class="form-control @error('lastname') is-invalid @enderror"
                                           name="lastname"
                                           value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="teamname">Team Name</label>

                                    <input id="teamname" type="text"
                                           class="form-control @error('teamname') is-invalid @enderror"
                                           name="teamname"
                                           value="{{ old('teamname') }}" required autocomplete="teamname" autofocus>
                                    @error('teamname')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="league">{{ __('League') }}</label>
                                    <input id="league" list="leagues" type="text"
                                           class="form-control @error('league') is-invalid @enderror"
                                           name="league"
                                           value="{{ old('league') }}" required autocomplete="league" autofocus>
                                    <datalist id="leagues">
                                        @foreach ($leagues as $role=>$item)
                                        <option value={{$item['name']}}>
                                            @endforeach
                                    </datalist>
                                    @error('league')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">E-mail</label>

                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example22">Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example22">Confirm password</label>
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                            type="submit"> {{ __('Register') }}
                                    </button>
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Already have an account?</p>
                                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href ='/login'" >Log in</button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
