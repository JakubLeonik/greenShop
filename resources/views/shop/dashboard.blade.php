<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <x-center-pane>
        <span class="fw-bold">
            Hello, {{ auth()->user()->name }}! <br>
        </span>
        <x-link href="{{ route('products.user-index') }}">
            My products
        </x-link>
        <x-link href="{{ route('orders.index') }}">
            My orders
        </x-link>
        <x-link href="{{ route('products.create') }}">
            Add new product
        </x-link>
        <a href="{{ route('shop.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
