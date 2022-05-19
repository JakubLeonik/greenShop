<x-layout>
    <x-header>
        Green Shop - Login page
    </x-header>
    <x-center-pane>
        <x-auth-validation-errors :errors="$errors" />
        <form class="w-50 p-3 d-flex flex-column justify-content-center align-items-center gap-3" method="POST" action="{{ route('login') }}">
            @csrf
            <input class="form-control rounded-pill" type="email" name="email" id="email" placeholder="Email" required/> <br>
            <input class="form-control rounded-pill" type="password" name="password" id="password" placeholder="Password" required /> <br>
            <label for="remember_me" class="inline-flex items-center">
                <input class="form-check-input me-1 rounded-pill" type="checkbox" name="remember" id="remember_me">
                Remember me
            </label> <br>
            <a href="{{ route('password.request') }}">
                Forgot your password?
            </a> <br>
            <x-button type="submit">
                Log in
            </x-button> <br>
            <x-link href="{{ route('login.external', ['provider' => 'google']) }}">
                Log in by Google
            </x-link> <br>
            <x-link href="{{ route('login.external', ['provider' => 'github']) }}">
                Log in by GitHub
            </x-link> <br>
            <a href="{{ route('shop.index') }}">Go back</a>
        </form>
    </x-center-pane>
</x-layout>
