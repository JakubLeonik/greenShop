<x-layout>
    <x-header>
        Green Shop
    </x-header>
    <x-navigation :categories="$categories"/>
    <x-center-pane>
        <div class="text-center py-3 px-5">
            <span class="fw-bold" style="font-size: 150%;">
                {{ $product->title }}
            </span>
            <hr>
            <span class="fw-bold">
                Price: {{ $product->price }}$
            </span>
            <hr>
            {{ $product->description }}
            <hr>
            <span class="fw-bold">
                {{$product->user->name}}  |
                Category: {{$product->category->name}} |
                Created at {{ date_format($product->created_at, 'j F Y') }}
            </span>
            <hr>
                <x-buy-button :product="$product" />
                @can('delete', $product)
                    <form class="w-100" action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="mx-auto my-3" type="submit">
                            Delete
                        </x-button>
                    </form>
                @endcan
                @can('update', $product)
                    <x-link class="mx-auto" href="{{ route('products.edit', ['product' => $product]) }}">
                        Edit
                    </x-link>
                @endcan
            <hr>
            <x-back-link/>
        </div>
    </x-center-pane>
</x-layout>
