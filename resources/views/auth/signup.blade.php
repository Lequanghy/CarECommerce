@props(['title' => 'Sign Up', 'bodyClass' => 'page-signup'])

<x-guest-layout :$title :$bodyClass>
    <h1 class="auth-page-title">{{ $title }}</h1>
    <form action="{{ route('signup.store') }}" method="post">
        @csrf
        <div class="form-group @error('email') has-error @enderror">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" />
            <p class="error-message">{{ $errors->first('email') }}</p>
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <input type="password" name="password" placeholder="Your Password" />
            <p class="error-message">{{ $errors->first('password') }}</p>
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <input type="password" name="password_confirmation" placeholder="Repeat Password" />
            <p class="error-message">{{ $errors->first('password') }}</p>
        </div>
        <hr />
        <div class="form-group @error('first_name') has-error @enderror">
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" />
            <p class="error-message">{{ $errors->first('first_name') }}</p>
        </div>
        <div class="form-group @error('last_name') has-error @enderror">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" />
            <p class="error-message">{{ $errors->first('last_name') }}</p>
        </div>
        <div class="form-group @error('phone') has-error @enderror">
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" />
            <p class="error-message">{{ $errors->first('phone') }}</p>
        </div>
        <button type="submit" class="btn btn-primary btn-login w-full"> Register </button>
    </form>


    <x-slot:haveAccount>
        Already have an account? -
        <a href="{{ route('login') }}"> Click here to login </a>
    </x-slot:haveAccount>

</x-guest-layout>
