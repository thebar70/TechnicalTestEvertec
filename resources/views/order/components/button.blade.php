@switch($order->status)
    @case(\App\Models\Order::STATUS_CREATED)
        <h2><strong>Total a Pagar: ${{number_format($order->product->price)  }}</strong> </h2><br>
        <form action="{{ url('placetopay/redirect_user/' . $order->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pagar</button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-clock-o"></i> Espere por favor</h4>
            </div>
            <div class="modal-body center-block">
                <p>Será redirijido al sitio de pago...</p>
                <div class="progress">
                    <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


