<x-guest-layout>

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 420px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Login</h3>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <!-- Error Login -->
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="form-control"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="form-control"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="form-check-input"
                        name="remember">

                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember me') }}
                    </label>
                </div>


                <button 
                    type="submit" 
                    class="btn btn-primary w-100">
                    Login
                </button>


                @if (Route::has('password.request'))
                    <div class="text-center mt-3">
                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    </div>
                @endif

            </form>

        </div>
    </div>

</x-guest-layout>