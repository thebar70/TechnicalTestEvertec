<h4>Producto: {{ $order->product->name }}</h4>
@switch($order->status)
    @case(\App\Models\Order::STATUS_CREATED)
        <h4>Estado Orden: Creada</h1>
        @break
    @case(\App\Models\Order::STATUS_PAYED)
        <h4>Estado Orden: Pagada</h4>
        @break
    @case(\App\Models\Order::STATUS_REJECTED)
        <h4>Estado Orden: Pago Rechazado</h4>
        @break
    @default

    @endswitch

    <h4>Fecha de compra: {{ date('d-m-Y', strtotime($order->created_at)) }}</h4>
    <h4>Hora de compra: {{ date('h-m', strtotime($order->created_at)) }}</h4>
