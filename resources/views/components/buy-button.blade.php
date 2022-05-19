@props(['product'])
<form class="w-100 d-flex justify-content-center" method="POST" action="#">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <x-button type="submit">
        Buy
    </x-button>
</form>
