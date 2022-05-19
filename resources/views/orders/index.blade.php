<x-layout>
    <x-header>
        My order
    </x-header>
    <x-center-pane>
        @foreach($orders as $orderItem)
            <div>
                <a href="{{ route('products.show', ['product' => $orderItem->product->id]) }}">
                    {{ $orderItem->product->title }}
                </a>
                | {{ date_format($orderItem->order->created_at, 'j F Y') }}
                | {{ $orderItem->order->status }}
            </div>
        @endforeach
        <x-form
            class="w-50 d-flex justify-content-center"
            method="POST"
            action="{{ route('orders.submit') }}"
            submit-text="Submit order">
            <input type="hidden" name="order" value="{{ $orders->first()->order->id }}" />
        </x-form>
        <a href="{{ route('shop.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
