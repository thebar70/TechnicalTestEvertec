@switch($order->status)
    @case(\App\Models\Order::STATUS_CREATED)
        <h2><strong>Total a Pagar: ${{number_format($order->product->price)  }}</strong> </h2><br>
        <form action="{{ url('placetopay/redirect_user/' . $order->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Pagar</button>
        </form>
        @break

    @case(\App\Models\Order::STATUS_PAYED)
        <a href="{{ route('product.list') }}" class="btn btn-primary">Estado de mi Pedido</a>
        
        @break

    @case(\App\Models\Order::STATUS_REJECTED)
        
        <form action="{{ url('placetopay/redirect_user/' . $order->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Reintentar</button>
        </form>
        @break

    @default

@endswitch
