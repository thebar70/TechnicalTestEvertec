<h4>Producto: {{ $order->product->name }}</h4>
<h4>Estado Orden: {{ $order->getCurrentStatus() }}</h4>
<h4>Fecha de compra: {{ date('d-m-Y', strtotime($order->created_at)) }}</h4>
<h4>Hora de compra: {{ date('h-m', strtotime($order->created_at)) }}</h4>
