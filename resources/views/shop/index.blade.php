<x-layout>
    <x-header>
        Green Shop
    </x-header>
    <x-navigation :categories="$categories"/>
    <x-sub-header>
        Recently added:
    </x-sub-header>
    <x-product-card-container>
        @foreach ($products as $product)
            <x-product-card :product="$product" :categories="$categories" />
        @endforeach
    </x-product-card-container>
    <div class="text-center w-100 pb-3">
        <a href="{{ route('products.index') }}">
            See all items
        </a>
    </div>
</x-layout>
