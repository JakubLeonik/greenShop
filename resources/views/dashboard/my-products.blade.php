<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <x-center-pane>
        Your products:
            <table class="table w-75 mx-auto">
                <thead>
                    <tr>
                        <th scope="col">
                            Title
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
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">
                                {{ $product->title }}
                            </th>
                            <td>
                                {{ date_format($product->created_at, 'j F Y') }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td class="d-flex gap-2">
                                <x-link class="w-50" href="{{ route('products.edit', ['product' => $product]) }}">
                                    Edit
                                </x-link>
                                <form class="w-50" action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-button type="submit">
                                        DELETE
                                    </x-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <a href="{{ route('dashboard.index') }}">
            Dashboard
        </a>
    </x-center-pane>
</x-layout>
