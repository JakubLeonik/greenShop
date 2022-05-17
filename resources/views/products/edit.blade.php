<x-layout>
    <x-header>
        Green Shop - Edit product
    </x-header>
    <x-center-pane>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form class="p-4 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
            @csrf
            <input class="form-control w-50 rounded-pill" type="text" name="title" id="title" placeholder="Title" required value="{{ old('title', $product->title) }}"/> <br>
            <input class="form-control w-50 rounded-pill" type="text" name="description" id="description" placeholder="Description" required value="{{ old('description', $product->description) }}"/> <br>
            <input class="form-control w-50 rounded-pill" type="number" name="price" id="price" placeholder="Price" required value="{{ old('price', $product->price) }}"/> <br>
            <select class="form-select rounded-pill w-25" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select> <br>
            <input class="form-control w-25 rounded-pill" type="submit" value="Edit product"> <br>
            <a style="color: #132A13" href="{{ route('dashboard.index') }}">
                Go back
            </a>
        </form>
    </x-center-pane>
</x-layout>
