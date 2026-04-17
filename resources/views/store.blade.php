@extends('base.base')

@if(session('success'))
   <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 shadow" style="z-index: 1050;" role="alert">
      <strong>Success!</strong> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif

@section('content')
    <h1>Store Page</h1>
    <a href="{{ route('product_insert_form') }}" class="btn btn-primary">Insert New Product</a>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $product->image_path ? asset('product_image/' . $product->image_path) : 'https://placehold.co/200x200?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><i>{{ $product->product_category->name }}</i></p>
                    <p class="card-text">Rp {{ number_format($product->price, 2) }}</p>
                    <p class="card-text">{{ $product->details }}</p>
                    
                    <a href="{{ route('product_edit_form', $product->id) }}" class="btn btn-warning">Edit</a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Are you sure you want to delete <strong>{{ $product->name }}</strong>?<br>
                        <span class="text-danger small">This action cannot be undone.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        
                        <form action="{{ route('delete_product', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection