<x-layout>
    <x-header>
        Green Shop - Add product
    </x-header>
    <x-center-pane>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-form
            method="POST"
            action="{{ route('products.store') }}"
            submit-text="Add product"
            :fields="[
                ['type' => 'text', 'name' => 'title'],
                ['type' => 'text', 'name' => 'description'],
                ['type' => 'number', 'name' => 'price'],
            ]">
            <select class="form-select rounded-pill w-25" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id')== $category->id) ? 'selected' : '' }}>
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            </select>
            <x-back-link/>
        </x-form>
    </x-center-pane>
</x-layout>
