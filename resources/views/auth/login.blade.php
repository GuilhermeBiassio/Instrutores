@extends('components.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4 col-12 col-md-6">
                <h4>Diário de Instrução</h4>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="col-12">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input id="email" class="form-control" type="email" name="email"
                                    @if ($errors->any()) value="{{ old('email') }}" @endif required autofocus
                                    autocomplete="username" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <label for="password" class="form-label">
                                    Senha
                                </label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="current-password" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4 d-grid gap-2">
                                <button class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
