{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/auth/images/DMS-favico.png') }}">
    <title>Apalit DMS </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/auth/css/theme.css') }}">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/bootstrap-icons.css') }}">

    <!-- Themify Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/themify-icons.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/fontawesome-icons.css') }}">
    <style>

     body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(80, 116, 158, 0.9);
    z-index: -1;
  }

    .form-wrapper {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      max-width: 500px;
    }

    .form-wrapper .step-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  </style>
</head>
<body style="background-image: url('{{ asset('assets/auth/images/pnp/34596925_2071293379578574_7004436569889177600_n 1.png') }}'); background-repeat: no-repeat; background-size: cover; ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xxs">
                        <div class="card card-bordered" style="border-radius: 20px; height: 500px;">
                            <span class="brand-logo pt-4 text-center">
                                <a href="html/index.html" class="logo-link">
                                    <img src="{{ asset('assets/auth/images/Logo3.svg') }}" width="150px" height="50px" class="logo-small logo-img" alt="">
                                </a>
                                <h4 class="nk-block-title pt-0 text-center text-dark">{{ __('Login') }}</h4>
                            </span>
                            <div class="card-inner card-inner">
                                <form method="POST" action="{{ route('login') }}" class="form-validate is-alter">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg @error('email')
                                            is-invalid @enderror" id="email" name="email" placeholder="Enter your email address or username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            {{-- <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a> --}}
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input required autocomplete="current-password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your passcode">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                                    </div>
                                </form><!-- form -->
                                {{-- <div class="form-note-s2 text-center pt-4"> <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot your Password</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>

<script src="{{ asset('assets/auth/js/bundle.js') }}"></script>
<script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
<script src="{{ asset('assets/auth/js/charts/chart-ecommerce.js') }}"></script>
</body>
</html>


