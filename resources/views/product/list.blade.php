@extends('home')
@section('content')
    @if (isset($products))
        <br><br>
        <div class="container">
            <div class="row">
                @foreach ($products as $key => $product)
                    <div class="col">
                        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                            <br>
                            <div class="card-title">{{ $product->name }}</div>
                            <div class="card-body">
                                <img class="card-img-top " src="{{ $product->image_path }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2>${{ $product->price }}</h2>
                                    <br>
                                    <a href="show/{{ $product->id }}" class="btn btn-primary">Ver</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @if (($key + 1) % 3 == 0)
                        <div class="w-100"></div>
                    @endif
                @endforeach
            </div>
        </div>

    @endif
@endsection
