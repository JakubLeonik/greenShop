<x-layout>
    <x-center-pane>
        <div class="d-flex flex-column justify-content-center align-items-center w-75 mx-auto gap-3 p-3">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. <br>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <input class="form-control rounded-pill" type="submit" value="Send veryfication email">
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input class="form-control rounded-pill" type="submit" value="Log out">
            </form>
            @if (session('status') == 'verification-link-sent')
                <div class="p-3">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif
        </div>
    </x-center-pane>
</x-layout>