@extends('base.base')
@section('content')
    <h2>This is Store Page</h2>
    <a href="{{ route('product_insert_form') }}" class="btn btn-primary">Insert New Product </a>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"><i>{{ $product->product_category->name }}</i></p>
                        <p class="card-text">Rp {{ number_format($product->price, 2) }}</p>
                        <p class="card-text">{{ $product->details }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection