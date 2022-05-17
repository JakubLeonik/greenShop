@props(['product'])
<div class="col-6 p-4">
    <div class=" col-12 p-5 rounded-pill text-center" style="background-color: #90a955">
        <span class="fw-bold d-flex flex-wrap justify-content-center" style="font-size: 150%;">
            <a href="{{ route('products.show', ['product' => $product]) }}">
                {{ $product->title }}
            </a>
        </span> <br>
        <span class="fw-bold">Price: {{ $product->price }}$</span> <br>
        {{ substr($product->description, 0, 100) }}...
    </div>
</div>
