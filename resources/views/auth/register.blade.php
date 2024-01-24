<div class="container">
    <form method="POST" action="{{ $action }}">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">
                Nome
            </label>
            <input id="name" class="form-control" type="text" name="name"
                @if ($errors->any()) value="{{ old('name') }}" @endif
                @if (isset($user)) value="{{ $user->name }}" @endif required autofocus
                autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input id="email" class="form-control" type="email" name="email"
                @if ($errors->any()) value="{{ old('email') }}" @endif
                @if (isset($user)) value="{{ $user->email }}" @endif required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">
                Senha
            </label>
            <input id="password" class="form-control" type="password" name="password"
                @if (!isset($user)) required @endif autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password" class="form-label">
                Confirme a Senha
            </label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                @if (!isset($user)) required @endif autocomplete="new-password" />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
