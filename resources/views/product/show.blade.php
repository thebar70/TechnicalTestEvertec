@extends('home')
@section('content')
    @if (isset($product))
        <div class="col-md-6">
            <div class="card " style="width: 15rem;">
                <br>
                <div class="card-title">{{ $product->name }}</div>
                <div class="card-body">
                    <img class="card-img-top" src="{{ $product->image_path }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p><br>
                        <h2>${{ $product->price }}</h2>
                        <br>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>

            </div>
        </div>

    @endif
@endsection
