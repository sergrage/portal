<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm ml-3" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-key"></i> Поменять пароль
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Введите новый пароль</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('administrator.users.update') }}">

            <div class="modal-body">
                 @csrf
                                 <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}<i class="fas fa-fw fa-lock "></i></label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <small class="form-text text-muted">Не менее 8 символов</small>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{$id}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Поменять</button>
            </div>
            </form>
        </div>
    </div>
</div>
