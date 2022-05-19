<x-layout>
    <x-header>
        My order
    </x-header>
    <x-center-pane>
        @foreach($orders as $orderItem)
            <div>
                <a href="{{ route('products.show', ['product' => $orderItem->product->id]) }}"> {{ $orderItem->product->title }}</a> | {{ date_format($orderItem->order->created_at, 'j F Y') }}
            </div>
        @endforeach
        <x-link>
            Submit order
        </x-link>
        <a href="{{ route('shop.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
