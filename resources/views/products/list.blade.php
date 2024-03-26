<div class="image-item">
    <div class="image img-view ms-2">
        @if ($product->discount > 0)
            <span class="fa-stck-sale">
                Hot
            </span>
        @endif
        <a href="/product/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">
            <img src="{{ $product->image }}" alt="">
        </a>
    </div>
    <div class="t-view">
        <a href="/product/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">{{ $product->name }}</a>
    </div>

    <div class="p-view ms-1">
        @if ($product->discount != 0)
            <span class="price format_price">
                {{ ($product->price * (100 - $product->discount)) / 100 }}
            </span>
            <span class="del format_price">
                {{ $product->price }}
            </span>
            <span class="sale-off">-{{ $product->discount }}%</span>
        @else
            <span class="price format_price">
                {{ $product->price }}
            </span>
        @endif
    </div>
</div>
