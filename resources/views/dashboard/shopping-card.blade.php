<x-layout>
    <x-header>
        Green Shop
    </x-header>
    <x-center-pane>
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">
                        Product title
                    </th>
                    <th scope="col">
                        Created At
                    </th>
                    <th scope="col">
                        Price
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $total_price = 0 ?>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">
                            <a href="{{route('products.show', ['product' => $order->product->id])}}">
                                {{$order->product->title}}
                            </a>
                        </th>
                        <td>
                            {{ date_format($order->created_at, 'j F Y') }}
                        </td>
                        <td>
                            {{ $order->product->price }}$
                            <?php $total_price += $order->product->price ?>
                        </td>
                        <td>
                            <a href="{{ route('orders.delete', ['order' => $order->id]) }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span class="fw-bold">
            Total price: {{ $total_price }}$
        </span>
    </x-center-pane>
    {{ $orders->appends(request()->input())->links('paginators.b5') }}
    <div class="text-center w-100 pb-3">
        <a href="{{ route('dashboard.index') }}">
            Back to dashboard
        </a>
    </div>
</x-layout>
