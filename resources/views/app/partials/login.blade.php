<form method="POST" action="{{ route('login') }}" class="pl-2">
    @csrf
    <div class="form-group">
        <div class="">
            <input id="email" type="text" placeholder="Введите имя аккаунта" class="form-control form-control-sm @error('accountName') is-invalid @enderror" name="accountName" value="{{ old('accountName') }}" required>
            @if (session('accountName'))
                 <small class="text-danger form-text">{{ session('accountName') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="">
            <input id="password" placeholder="Пароль" type="password" class="form-control form-control-sm @error('activeDirectoryPassword') is-invalid @enderror" name="activeDirectoryPassword" required>
            @if (session('activeDirectoryPassword'))
                <small class="text-danger form-text">{{ session('activeDirectoryPassword') }}</small>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="">
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
        </div>
    </div>
</form>


