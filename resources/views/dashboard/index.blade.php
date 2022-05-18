<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <x-center-pane>
        <span class="fw-bold">
            Hello, {{ auth()->user()->name }}! <br>
        </span> <br>
        <div class="w-100 d-flex flex-column gap-3 align-items-center justify-content-center">
            <a class="d-block w-50 btn btn-primary border-dark text-dark rounded-pill w-50" style="background-color: #efefef;" href="{{ route('dashboard.my-products') }}">
                Your products
            </a>
            <a class="d-block w-50 btn btn-primary border-dark text-dark rounded-pill w-50" style="background-color: #efefef;" href="{{ route('dashboard.shopping-card') }}">
                Shopping card
            </a>
            <a class="d-block w-50 btn btn-primary border-dark text-dark rounded-pill w-50" style="background-color: #efefef;" href="{{ route('products.create') }}">
                Add new product
            </a>
        </div>
        <br>
        <a href="{{ route('main.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
