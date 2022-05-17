<x-layout>
    <x-header>
        Green Shop
    </x-header>
    <x-navigation :categories="$categories"/>
    <x-product-card-container>
        @foreach ($products as $product)
            <x-product-card :product="$product" :categories="$categories" />
        @endforeach
    </x-product-card-container>
    {{ $products->appends(request()->input())->links('paginators.b5') }}
</x-layout>
