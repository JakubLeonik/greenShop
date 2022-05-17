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
            <a href="{{ url()->previous() }}">
                Go back
            </a>
        </div>
    </x-center-pane>
</x-layout>
