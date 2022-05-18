<x-layout>
    <x-header>
        Green Shop
    </x-header>
    <x-center-pane>
        @foreach ($orders as $order)
            {{$order->product_id}} -> {{$order->user_id}} | {{$order->created_at}} <br>
        @endforeach
    </x-center-pane>
    {{ $orders->appends(request()->input())->links('paginators.b5') }}
    <div class="text-center w-100 pb-3">
        <a href="{{ route('products.index') }}">
            Back to all items
        </a>
    </div>
</x-layout>
