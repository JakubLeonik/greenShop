<x-layout>
    <x-header>
        Green Shop - Add product
    </x-header>
    <x-center-pane>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form class="p-4 d-flex flex-column justify-content-center align-items-center" method="POST" action="{{ route('products.store') }}">
            @csrf
            <input class="form-control w-50 rounded-pill" type="text" name="title" id="title" placeholder="Title" required value="{{ old('title') }}"/> <br>
            <input class="form-control w-50 rounded-pill" type="text" name="description" id="description" placeholder="Description" required value="{{ old('description') }}"/> <br>
            <input class="form-control w-50 rounded-pill" type="number" name="price" id="price" placeholder="Price" required value="{{ old('price') }}"/> <br>
            <select class="form-select rounded-pill w-25" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id')== $category->id) ? 'selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select> <br>
            <input class="form-control w-25 rounded-pill" type="submit" value="Add product"> <br>
            <a style="color: #132A13" href="{{ route('dashboard.index') }}">
                Go back
            </a>
        </form>
    </x-center-pane>
</x-layout>
