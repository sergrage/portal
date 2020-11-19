<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('Добавить новую роль') }}
           </div>
        <div class="card-body">
            <form method="POST" action="{{ route('administrator.roles.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Роль') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('roleName') is-invalid @enderror" name="roleName" value="{{ old('roleName') }}">
                        @error('roleName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" name="newRole" class="btn btn-primary">
                            {{ __('Добавить') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
