<x-layout>
    <x-header>
        Green Shop - Register
    </x-header>
    <x-center-pane>
        <x-auth-session-status :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form class="p-4 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('register') }}">
            @csrf
            <input class="form-control w-50 rounded-pill" id="name" type="text" name="name" id="name" placeholder="Name" required /> <br>
            <input class="form-control w-50 rounded-pill" id="email" type="email" name="email" id="email" placeholder="Email" required /> <br>
            <input class="form-control w-50 rounded-pill" type="password" name="password" id="password" placeholder="Password" required /> <br>
            <input class="form-control w-50 rounded-pill" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required /> <br>
            <a style="color: #132A13" href="{{ route('login') }}">
                Already registered?
            </a> <br>
            <input class="form-control w-25 rounded-pill" type="submit" value="Register"> <br>
            <a style="color: #132A13" href="{{ route('main.index') }}">Go back</a>
        </form>
    </x-center-pane>
</x-layout>