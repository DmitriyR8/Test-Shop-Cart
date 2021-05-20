@foreach($products['data'] as $product)

    <div class = 'products'>
        <div class = 'opacity-for-image'></div>
        <picture>
            <source srcset = "{{'products/image/'.$product['id']}}" type="image/webp">
            <source srcset = "{{'products/image/'.$product['id']}}" type="image/png">
            <img src = "{{'products/image/'.$product['id']}}">
        </picture>
        <div class = 'products-info'>
            <p class = 'logo-name-product'>{{$product['title']}}</p>
            <span class = 'products-text-load'>{!! $product['description'] !!}</span>
            <input type="hidden" id="product-id" value="{{$product['id']}}">
            <button class = 'button raised hoverable cart-add' type = 'submit'><div class = 'anim'></div>Add to Cart</button>
        </div>
    </div>
@endforeach
