@extends('home')
@section('content')
    @if (isset($orders))
        <br><br>
        <div class="container h-30">
            <div class="row justify-content-center h-30">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="width: 100rem;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row"
                                class="table-secondary table  table-sm table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cliente</th>
                                        <th>Telefono</th>
                                        <th>Total Pagado</th>
                                        <th>Estado</th>
                                        <th style="width: 8%">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->customer_mobile }}</td>
                                            <td>{{ number_format($order->total_amount) }}</td>
                                            <td>{{ $order->getCurrentStatus() }}</td>
                                            <td>
                                                <button type="button"
                                                    onclick="location.href='{{ route('order.show', $order->id) }}';"
                                                    data-toggle="tooltip" title="" class="btn btn-link  btn-primary"
                                                    data-original-title="Ver">
                                                    <i class="fa fa-info"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
