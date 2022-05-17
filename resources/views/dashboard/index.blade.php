<x-layout>
    <x-header>
        Dashboard
    </x-header>
    <x-center-pane>
        <span class="fw-bold">
            Hello, {{ auth()->user()->name }}! <br>
        </span>
        Your products:
        <div class="w-50 mx-auto py-2">
            <table class="table">
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
                    <th scope="col">
                        Actions
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
                            <td>
                                <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-link">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-link" type="submit" value="DELETE">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-link w-25 my-3" href="{{ route('products.create') }}">
            Add new product
        </a> <br>
        <a href="{{ route('main.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-layout>
