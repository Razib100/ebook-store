@extends('frontend.layouts.index')

@section('content')
<div class="vs-cart-wrapper space-top space-extra-bottom">
    <div class="container">
        @if(count($cart) > 0)
        <form action="#" class="woocommerce-cart-form">
            <table class="cart_table">
                <thead>
                    <tr>
                        <th class="cart-col-image">Image</th>
                        <th class="cart-col-productname">Book Name</th>
                        <th class="cart-col-price">Price</th>
                        <th class="cart-col-quantity">Discount</th>
                        <th class="cart-col-total">Total</th>
                        <th class="cart-col-remove">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    @php
                    $discountPrice = $item['price'] - ($item['price'] * $item['discount'] / 100);
                    @endphp
                    <tr class="cart_item">
                        <td data-title="Product">
                            <a class="cart-productimage" href="{{ route('book.byId', $item['id']) }}">
                                <img width="100" height="95" src="{{ asset($item['cover_image']) }}" alt="{{ $item['title'] }}">
                            </a>
                        </td>
                        <td data-title="Name">
                            <a class="cart-productname" href="{{ route('book.byId', $item['id']) }}">
                                {{ $item['title'] }}
                            </a>
                        </td>
                        <td data-title="Price">
                            <span class="amount"><bdi>${{ number_format($item['price'], 2) }}</bdi></span>
                        </td>
                        <td data-title="Discount">
                            @if($item['discount'] > 0)
                            <span>{{ $item['discount'] }}%</span>
                            @else
                            <span>—</span>
                            @endif
                        </td>
                        <td data-title="Total">
                            <span class="amount"><bdi>${{ number_format($discountPrice, 2) }}</bdi></span>
                        </td>
                        <td data-title="Remove">
                            <a href="{{ route('cart.removed', $item['id']) }}" class="remove text-danger">
                                <i class="fal fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="actions text-end">
                            <span class="vs-btn me-2">Grand Total: ${{ number_format($grandTotal, 2) }}</span>
                            <a href="#" id="makePaymentBtn" class="vs-btn">Make Payment</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        @else
        <!-- <div class="text-center py-5">
            <h4>Your cart is empty 😢</h4>
            <a href="{{ route('home') }}" class="vs-btn mt-3">Continue Shopping</a>
        </div> -->
        <div class="text-center py-5">
            @if(!empty($removedPurchasedProducts))
            <h4>Some products were removed from your cart because you have already purchased them 😢</h4>
            <a href="{{ route('home') }}" class="vs-btn mt-3">Continue Shopping</a>
            @elseif(empty($cart))
            <h4>Your cart is empty 😢</h4>
            <a href="{{ route('home') }}" class="vs-btn mt-3">Continue Shopping</a>
            @else
            {{-- Show the normal cart table here --}}
            @endif
        </div>

        @endif
    </div>
</div>
<!-- Payment Modal -->
<div class="modal fade" id="payment-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3 text-danger" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
            </button>
            <div id="payment-loading-content" class="text-center py-5">
                <div class="spinner-border text-primary"></div>
                <p>Loading payment...</p>
            </div>

            <div id="payment-content" style="display:none;">
                <form id="payment-form">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input id="name" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" required>
                    </div>
                    <div id="card-element" class="mb-3"></div>
                    <button type="submit" class="btn btn-success w-100">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // When "Make Payment" button is clicked
        $('#makePaymentBtn').on('click', function() {
            openPaymentModal();
        });

        // Open modal and fetch Stripe keys
        // Old function working fine
        // function openPaymentModal(timeout = 1500) {
        //     const paymentModal = new bootstrap.Modal(document.getElementById('payment-modal'), {
        //         keyboard: false,
        //         backdrop: 'static',
        //     });

        //     paymentModal.show();
        //     $('#payment-content').hide();
        //     $('#payment-loading-content').show();

        //     fetch('{{ route('payment.createIntent') }}', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'Accept': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        //         },
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (!data.publicKey || !data.clientSecret) {
        //             throw new Error('Invalid Stripe keys');
        //         }
        //         initializeStripe(data.publicKey, data.clientSecret);
        //         setTimeout(() => {
        //             $('#payment-content').show();
        //             $('#payment-loading-content').hide();
        //         }, timeout);
        //     })
        //     .catch(error => {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Payment environment not found!',
        //             text: 'Please contact support.',
        //         });
        //         console.error('Stripe init error:', error);
        //     });
        // }
        function openPaymentModal(timeout = 1500) {
            // Check if user is logged in by making a small request to backend
            fetch('{{ route('check.auth') }}', {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                        },
                    })
                .then(res => res.json())
                .then(authData => {
                    if (!authData.logged_in) {
                        // User not logged in
                        Swal.fire({
                            icon: 'warning',
                            title: 'Login Required',
                            text: 'You must be logged in to complete the checkout.',
                            confirmButtonText: 'Login Now'
                        }).then(() => {
                            window.location.href = '/customer/login'; // redirect to login page
                        });
                        return; // stop further execution
                    }

                    // User is logged in, continue opening modal
                    const paymentModal = new bootstrap.Modal(document.getElementById('payment-modal'), {
                        keyboard: false,
                        backdrop: 'static',
                    });

                    paymentModal.show();
                    $('#payment-content').hide();
                    $('#payment-loading-content').show();

                    fetch('{{ route('payment.createIntent') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                },
                            })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.publicKey || !data.clientSecret) {
                                throw new Error('Invalid Stripe keys');
                            }
                            initializeStripe(data.publicKey, data.clientSecret);
                            setTimeout(() => {
                                $('#payment-content').show();
                                $('#payment-loading-content').hide();
                            }, timeout);
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Payment environment not found!',
                                text: 'Please contact support.',
                            });
                            console.error('Stripe init error:', error);
                        });

                })
                .catch(err => {
                    console.error('Auth check failed:', err);
                });
        }


        // Initialize Stripe Elements
        function initializeStripe(publicKey, clientSecret) {
            const stripe = Stripe(publicKey);
            const elements = stripe.elements({
                clientSecret
            });
            const paymentElement = elements.create('payment');
            paymentElement.mount('#card-element');

            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const submitButton = form.querySelector('button');
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Processing...';

                const name = $('#name').val();
                const email = $('#email').val();

                const {
                    error: submitError
                } = await elements.submit();
                if (submitError) {
                    showError(submitError.message);
                    resetButton();
                    return;
                }

                stripe.confirmPayment({
                        elements,
                        clientSecret,
                        confirmParams: {
                            payment_method_data: {
                                billing_details: {
                                    name,
                                    email
                                },
                            },
                        },
                        redirect: 'if_required'
                    })
                    .then(result => {
                        if (result.error) {
                            showError(result.error.message);
                            resetButton();
                        } else {
                            const paymentIntent = result.paymentIntent;
                            savePayment(paymentIntent, name, email);
                        }
                    })
                    .catch(err => {
                        showError(err.message);
                        resetButton();
                    });

                function resetButton() {
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Pay Now';
                }

                function showError(message) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Failed',
                        text: message || 'Something went wrong. Please try again.',
                    });
                }

                function savePayment(paymentIntent, name, email) {
                    $.ajax({
                        url: '/store-payment',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        data: {
                            payment_id: paymentIntent.id,
                            amount: paymentIntent.amount,
                            currency: paymentIntent.currency,
                            status: paymentIntent.status,
                            payment_method: paymentIntent.payment_method,
                            client_secret: paymentIntent.client_secret,
                            payment_method_types: paymentIntent.payment_method_types.join(', '),
                            created_id: paymentIntent.created,
                            email: email,
                            name: name,
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Payment Successful',
                                text: 'Thank you for your purchase!',
                            }).then(() => {
                                location.reload(); // reload cart after payment
                            });
                        },
                        error: function(xhr) {
                            showError('Error saving payment: ' + xhr.responseText);
                        }
                    });
                }
            });
        }
    });
</script>
@endsection