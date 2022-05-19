<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <x-center-pane>
        <span class="fw-bold">
            Hello, {{ auth()->user()->name }}! <br>
        </span>
        <x-link href="{{ route('dashboard.my-products') }}">
            Your products
        </x-link>
        <x-link href="{{ route('dashboard.shopping-card') }}">
            Shopping card
        </x-link>
        <x-link href="{{ route('products.create') }}">
            Add new product
        </x-link>
        <a href="{{ route('main.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
