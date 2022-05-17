<x-layout>
    <x-header>
        Green Shop - Login page
    </x-header>
    <x-center-pane>
        <x-auth-validation-errors :errors="$errors" />
        <form class="p-3 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('login') }}">
            @csrf
            <input class="form-control w-50 rounded-pill" type="email" name="email" id="email" placeholder="Email" required/> <br>
            <input class="form-control w-50 rounded-pill" type="password" name="password" id="password" placeholder="Password" required /> <br>
            <label for="remember_me" class="inline-flex items-center">
                <input class="form-check-input me-1 rounded-pill" type="checkbox" name="remember" id="remember_me">
                Remember me
            </label> <br>
            <a href="{{ route('password.request') }}">
                Forgot your password?
            </a> <br>
            <input class="form-control w-25 rounded-pill" type="submit" value="Log in"> <br>
            <a class="text-decoration-none form-control w-25 rounded-pill" href="{{ route('login.external', ['provider' => 'google']) }}">
                Log in by Google
            </a> <br>
            <a class="text-decoration-none form-control w-25 rounded-pill" href="{{ route('login.external', ['provider' => 'github']) }}">
                Log in by GitHub
            </a> <br>
            <a href="{{ route('main.index') }}">Go back</a>
        </form>
    </x-center-pane>
</x-layout>