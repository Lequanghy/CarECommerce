@props(['title' => 'Login', 'bodyClass' => 'page-login'])

<x-guest-layout :$title :$bodyClass>
    <h1 class="auth-page-title">{{ $title }}</h1>

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div class="form-group @error('email') has-error @enderror">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" />
            <p class="error-message">{{ $errors->first('email') }}</p>
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <input type="password" name="password" placeholder="Your Password" />
            <p class="error-message">{{ $errors->first('password') }}</p>
        </div>
        <div class="text-right mb-medium">
            <a href="/password-reset.html" class="auth-page-password-reset">Reset Password</a>
        </div>
        <button type="submit" class="btn btn-primary btn-login w-full"> Login </button>
    </form>

    <x-slot:haveAccount>
        Don't have an account? -
        <a href="{{ route('signup') }}"> Click here to create one</a>
    </x-slot:haveAccount>

</x-guest-layout>
