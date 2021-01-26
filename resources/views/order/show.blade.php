@extends('home')
@section('content')
    @if (isset($order))
        <br><br>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="width: 30rem;">
                    <div class="card-body">
                        
                        <h3><strong>Sobre Tu Orden</strong></h3>
                        <br>
                        @include('order.components.order')
                        <br><br>
                        <h3><strong>Tus Datos</strong> </h3>
                        @include('order.components.customer')
                        <br><br>
                        @include('order.components.button')
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
