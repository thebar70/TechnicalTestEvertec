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
                        <h3>Sobre Tu Orden</h3>
                        <h4>Estado de orden: {{ $order->status }}</h1>
                            <h4>Fecha de compra: {{ date('d-m-Y', strtotime($order->created_at)) }}</h4>
                            <h4>Hora de compra: {{ date('h-m', strtotime($order->created_at)) }}</h4><br>
                            <h2>Total a Pagar: ${{ $order->product->price }}</h2>
                            <br><br>
                            <h3>Tus Datos</h3>
                            <h4>Nombre: {{ $order->customer_name . ' ' . $order->customer_surname }}</h4>
                            <h4>Documento: {{ $order->customer_document }}</h4>
                            <h4>Email: {{ $order->customer_email }}</h4>
                            <h4>Telefono: {{ $order->customer_mobile }}</h4>
                            <form action="{{ url('placetopay/redirect_user/' . $order->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Pagar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
