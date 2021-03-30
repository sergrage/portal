<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('Добавить нового пользователя') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('administrator.users.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}<i class="fas fa-fw fa-lock "></i></label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}<i class="fas fa-fw fa-lock "></i></label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    <small class="form-text text-muted">Не менее 8 символов</small>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-md-4 col-form-label text-md-right">Присвоить роль</label>
                    <div class="col-md-6 ">
                      <select class="select2 form-control" name="roles[]" multiple="multiple">
                          <option></option>
                        @foreach($roles as $role)
                          <option>{{ $role->roleName }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" name="newUser" class="btn btn-primary">
                            {{ __('Регистрация') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
