@extends('components.site.main')
@section('main')
    <div class="w-full p-10 bg-slate-300">
        <form class="w-full md:w-[700px] xl:w-[500px] sm:mx-auto p-7 shadow-2xl rounded-lg left-0 bg-[#fff]" method="POST"
            action="{{ route('login') }}">
            <div class="border-b-2 mb-[20px]">
                <span class="font-bold text-lg">Login</span>
            </div>
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                    Email
                </label>
                <input id="email"
                    class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    type="email" name="email" @if ($errors->any())  @endif value="{{ old('email') }}"
                    required autofocus autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-lg text-[#3a3a3a] p-2 text-[15px]">
                    Senha
                </label>
                <input id="password"
                    class="bg-[#f6f6f6] text-[#3a3a3a] text-[15px] rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm font-bold text-gray-600">Remeber me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="text-white delay-75 bg-[#1e1e1e] transition duration-300 hover:bg-[#00a859] focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold text-lg rounded-full text-[15px] w-full sm:w-auto px-5 py-2.5 text-center">Entrar</button>
            </div>
        </form>
    </div>
@endsection
