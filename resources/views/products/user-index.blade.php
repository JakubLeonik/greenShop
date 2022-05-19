<x-layout>
    <x-sub-header>
        Your products
    </x-sub-header>
    <x-product-card-container>
        @foreach ($products as $product)
            <x-product-card :product="$product" :categories="$categories" />
        @endforeach
        {{ $products->appends(request()->input())->links('paginators.b5') }}
        <x-back-link />
    </x-product-card-container>
</x-layout>
