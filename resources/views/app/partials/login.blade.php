
<form method="POST" action="{{ route('login') }}" class="pl-2">
    @csrf
    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" placeholder="Email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="password" placeholder="Пароль" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Запомни меня') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ __('Войти') }}
            </button>
        <!--
                                @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                </a>
@endif -->
        </div>
    </div>
</form>


