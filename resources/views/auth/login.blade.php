@extends('app')
@section('main')
<article class="auth">
  <header>
    <div class="title">
      <h1>Login</h1>
    </div>
  </header>
  <x-form
    method="post"
    action="{{ route('login') }}"
  >
    <div>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}">
      <x-input-error for="email" />
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="{{ old('password') }}">
      <x-input-error for="password" />
    </div>
    <div>
      <input type="submit" value="Log in">
    </div>
  </x-form>
</article>
@endsection
