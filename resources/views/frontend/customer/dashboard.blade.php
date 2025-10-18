@extends('frontend.layouts.index')

@section('content')
<div class="vs-cart-wrapper space-top space-extra-bottom">
    <div class="container">
    <a href="{{ route('customer.panel') }}" class="vs-btn mb-2" style=" float:right !important">Upload Book</a>
        @if($products->count() > 0)
        <table class="cart_table">
            <thead>
                <tr>
                    <th class="cart-col-image">Image</th>
                    <th class="cart-col-productname">Book Name</th>
                    <th class="cart-col-author">Author Name</th>
                    <th class="cart-col-status">Payment Status</th>
                    <th class="cart-col-format">Available Format</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="cart_item">
                    <td data-title="Image">
                        <a href="{{ route('book.byId', $product->id) }}">
                            <img width="50" height="30" src="{{ asset($product->cover_image) }}" alt="{{ $product->title }}">
                        </a>
                    </td>
                    <td data-title="Book Name">
                        <a href="{{ route('book.byId', $product->id) }}">
                            {{ $product->title }}
                        </a>
                    </td>
                    <td data-title="Author Name">
                        {{ $product->author->name ?? 'Unknown Author' }}
                    </td>
                    <td data-title="Payment Status">
                        <span class="payment_status">{{ $product->payment_status ? 'Paid' : 'Pending' }}
                        </span>
                    </td>
                    <td data-title="Available Format">
                        @if($product->pdf_file)
                        <a href="{{ route('product.download', ['product' => $product->id, 'format' => 'pdf']) }}"
                            class="btn btn-sm btn-success me-1">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                        @endif

                        @if($product->epub_file)
                        <a href="{{ route('product.download', ['product' => $product->id, 'format' => 'epub']) }}"
                            class="btn btn-sm btn-success me-1">
                            <i class="fas fa-file-pdf"></i> EPUB
                        </a>
                        @endif

                        @if($product->mobi_file)
                        <a href="{{ route('product.download', ['product' => $product->id, 'format' => 'mobi']) }}"
                            class="btn btn-sm btn-success">
                            <i class="fas fa-file-pdf"></i> MOBI
                        </a>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center py-5">
            <h4>You have not purchased any products yet.</h4>
            <a href="{{ route('home') }}" class="vs-btn mt-3">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection