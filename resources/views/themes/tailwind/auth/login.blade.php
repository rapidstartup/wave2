@extends('theme::layouts.app')

@section('content')
    <div class="md:block absolute left-1/2 -translate-x-1/2 -mt-36 blur-2xl opacity-70 pointer-events-none -z-10" style="--tw-blur: blur(40px); filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);" aria-hidden="true">
        <img src="./images/auth-illustration.svg" class="max-w-none" width="1440" height="450" alt="Page Illustration">
    </div>
    <div class="flex flex-col justify-center py-20 sm:px-6 lg:px-8 bg-slate-900 text-slate-200" style="--tw-bg-opacity: 1; background-color: rgb(15 23 42 / var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(226 232 240 / var(--tw-text-opacity));">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-white text-center bg-clip-text text-transparent bg-gradient-to-r from-slate-200/60 via-slate-200 to-slate-200/60 lg:text-5xl">
                Sign in Below
            </h2>
            <p class="mt-4 text-sm leading-5 text-center text-gray-600 max-w">
                or, you can
                <a href="{{ route('register') }}" class="font-medium transition duration-150 ease-in-out text-wave-500 hover:text-wave-600 focus:outline-none focus:underline">
                    signup here
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 border shadow border-gray-50 sm:rounded-lg sm:px-10">
                <form action="#" method="POST">
                    @csrf
                    <div>

                        @if(setting('auth.email_or_username') && setting('auth.email_or_username') == 'username')
                            <label for="username" class="block text-sm font-medium leading-5 text-white">Username</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="username" type="username" name="username" required class="w-full form-input bg-gray-700 text-slate-50" autofocus>
                            </div>

                            @if ($errors->has('username'))
                                <div class="mt-1 text-red-500">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                        @else
                            <label for="email" class="block text-sm font-medium leading-5 text-white">Email address</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="email" type="email" name="email" required class="w-full form-input bg-gray-700 text-slate-50" autofocus>
                            </div>

                            @if ($errors->has('email'))
                                <div class="mt-1 text-red-500">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        @endif


                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-white">
                            Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" type="password" name="password" required class="w-full form-input bg-gray-700 text-slate-50">
                        </div>
                        @if ($errors->has('password'))
                            <div class="mt-1 text-red-500">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="text-wave-600 border-0 border-gray-300 rounded shadow-sm focus:border-wave-300 focus:ring focus:ring-offset-0 focus:ring-wave-200 focus:ring-opacity-50 rounded-xl" {{ old('remember') ? ' checked' : '' }}>
                            <label for="remember" class="block ml-2 text-sm leading-5 text-white">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route('password.request') }}" class="font-medium transition duration-150 ease-in-out text-wave-500 hover:text-wave-400 focus:outline-none focus:underline">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 active:bg-wave-500">
                                Sign in
                            </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
