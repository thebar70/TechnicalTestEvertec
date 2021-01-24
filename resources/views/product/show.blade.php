@extends('home')
@section('content')
    @if (isset($product))
        <br><br>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="width: 30rem;">
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
        </div>
    @endif
@endsection
