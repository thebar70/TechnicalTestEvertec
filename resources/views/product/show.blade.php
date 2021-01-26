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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@mdo">Comprar</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- Model sectio --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">
                            <strong>Ingresa tus datos para procesar tu orden</h5></strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form action={{ url('order/store') }} method="POST">
                        {{ csrf_field() }}
                        <input id="product_id" name="product_id" type="hidden" value="{{ $product->id }}">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tu Nombre:</label>
                                <input type="text" required='required' class="form-control border border-dark"
                                    name="customer_name" id="customer_name" placeholder="Pedro...">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" required='required' class="form-control border border-dark"
                                    name="customer_surname" id="customer_surname" placeholder="Picapiedra...">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="email" required='required' class="form-control border border-dark"
                                    name="customer_email" id="customer_email" placeholder="pedropicapiedra@dominio.com">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tu Telefono</label>
                                <input type="text" required='required' class="form-control border border-dark"
                                    name="customer_mobile" id="customer_mobile" placeholder="312 555 555">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tipo de Documento</label>
                                <input type="text" required='required' class="form-control border border-dark"
                                    name="customer_ducument_type" id="customer_document_type" placeholder="CC">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Documento</label>
                                <input type="text" required='required' class="form-control border border-dark"
                                    name="customer_document" id="customer_document" placeholder="1234567">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

