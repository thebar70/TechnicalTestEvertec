@extends('home')
@section('content')
    @if (isset($order))
        <br><br>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="width: 30rem;">
                    <div class="card-title">Resumen </div>
                    <div class="card-body">
                        <h3>Producto: {{ $order->product->name }}</h3><br>
                        <h4>Estado de orden: {{ $order->status }}</h1>
                            <h4>Fecha de compra: {{ date('d-m-Y', strtotime($order->created_at)) }}</h4>
                            <h4>Hora de compra: {{ date('h-m', strtotime($order->created_at)) }}</h4><br>
                            <h2>Total: ${{ $order->product->price }}</h2>
                            <br><br>
                            <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
