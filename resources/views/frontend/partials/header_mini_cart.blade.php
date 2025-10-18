{{-- expects $cartItems (Collection) and $subtotal --}}
@if($cartItems->isEmpty())
<ul class="cart_list">
    <li class="mini_cart_item">
        <div class="small">Your cart is empty</div>
    </li>
</ul>
<p class="total"><strong>Subtotal:</strong> <span class="amount">$0.00</span></p>
<p class="buttons">
    <a href="{{ route('cart.index') }}" class="vs-btn">View cart</a>
    <a href="#" class="vs-btn checkout">Checkout</a>
</p>
@else
<ul class="cart_list">
    @foreach($cartItems as $item)
    <li class="mini_cart_item d-flex align-items-start">
        <a href="javascript:void(0);" class="remove me-2 remove-from-cart" data-id="{{ $item['id'] }}">
            <i class="far fa-times"></i>
        </a>

        <a href="{{ route('book.byId', $item['id']) }}" class="img me-2">
            <img src="{{ asset($item['cover_image']) }}" alt="Cart Image" width="60" height="70" />
        </a>

        <div class="flex-grow-1">
            <a href="{{ route('book.byId', $item['id']) }}" class="product-title d-block">
                {{ \Illuminate\Support\Str::limit($item['title'], 40) }}
            </a>

            <span class="amount d-block">${{ number_format($item['final_price'], 2) }}</span>

            {{-- For ebooks we keep qty = 1, but show label --}}
            <div class="small text-muted">Qty: 1</div>

            <div class="subtotal small mt-1">
                <span>Subtotal:</span>
                <span class="amount">${{ number_format($item['final_price'], 2) }}</span>
            </div>
        </div>
    </li>
    @endforeach
</ul>

<p class="total mt-2">
    <strong>Subtotal:</strong>
    <span class="amount">${{ number_format($subtotal, 2) }}</span>
</p>

<p class="buttons">
    <a href="{{ route('cart.index') }}" class="vs-btn">View cart</a>
</p>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.body.addEventListener('click', function(e) {
            const el = e.target.closest('.mini_cart_item .remove');
            if (!el) return;

            e.preventDefault();
            const productId = el.dataset.id;
            if (!productId) return;

            fetch(`/cart/remove/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(async res => {
                    const data = await res.json();
                    if (res.ok && data.status === 'success') {
                        // Update mini-cart HTML and badge
                        if (data.html) document.getElementById('mini-cart-wrapper').innerHTML = data.html;
                        if (data.count !== undefined) document.getElementById('cart-count').textContent = data.count;

                        // Show toast (danger for remove)
                        showToast(data.message || 'Product removed!', 'danger');
                    } else {
                        showToast(data.message || 'Something went wrong!', 'danger');
                    }
                })
                .catch(err => {
                    console.error(err);
                    showToast('Request failed, try again.', 'danger');
                });
        });

    });
</script>