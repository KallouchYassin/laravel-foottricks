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

<body class="h-100 gradient-form" style="background-color: #ffffff;">
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <p>Create your account</p>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">E-mail Address</label>

                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
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

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">{{ __('Login') }}
                                        </button>
                                        <a class="text-muted" href="/password/reset">Forgot Your Password?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href ='/register'">Create new</button>
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
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyAy5LXpJtHLXQ9TWvmRLtJcVCcNkUgllvQ",
        authDomain: "foottricks-5a2f5.firebaseapp.com",
        databaseURL: "https://foottricks-5a2f5-default-rtdb.europe-west1.firebasedatabase.app",
        projectId: "foottricks-5a2f5",
        storageBucket: "foottricks-5a2f5.appspot.com",
        messagingSenderId: "359302995301",
        appId: "1:359302995301:web:26b89dedf49548dc0cd58c",
        measurementId: "G-545JBBLV9F"
    };
    firebase.initializeApp(config);
    var facebookProvider = new firebase.auth.FacebookAuthProvider();
    var googleProvider = new firebase.auth.GoogleAuthProvider();
    var facebookCallbackLink = '/login/facebook/callback';
    var googleCallbackLink = '/login/google/callback';

    async function socialSignin(provider) {
        var socialProvider = null;
        if (provider == "facebook") {
            socialProvider = facebookProvider;
            document.getElementById('social-login-form').action = facebookCallbackLink;
        } else if (provider == "google") {
            socialProvider = googleProvider;
            document.getElementById('social-login-form').action = googleCallbackLink;
        } else {
            return;
        }
        firebase.auth().signInWithPopup(socialProvider).then(function (result) {
            result.user.getIdToken().then(function (result) {
                document.getElementById('social-login-tokenId').value = result;
                document.getElementById('social-login-form').submit();
            });
        }).catch(function (error) {
            // do error handling
            console.log(error);
        });
    }
</script>

@endsection
