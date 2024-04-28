@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Destinos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"> Crear Destino</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form form method="POST" action="{{ route('destino.store') }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-6" style="margin-bottom: 20px">
                                <label for="inputState" class="form-label">Productos</label>
                                <select id="inputState" name="producto_id" class="custom-select">
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="inputAddress" name="nombre" placeholder="*...">
                            </div> --}}
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <label for="inputState" class="form-label">Nombre</label>
                                <select id="inputState" name="nombre" class="custom-select">
                                    <option value="Punto de Venta 1">Punto de Venta 1</option>
                                    <option value="Punto de Venta 2">Punto de Venta 2</option>
                                    <option value="Punto de Venta 3">Punto de Venta 3</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="*...">
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <label for="fecha" class="form-label">Fecha de Entrada</label>
                                <input type="date" step="0.01" class="form-control" id="fecha" name="fecha" placeholder="*...">
                            </div>
                            
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Aceptar</button>
                              <a href="{{ route('productos.index') }}" class="btn btn-info"><i
                                class="fas fa-arrow-left"></i> Volver</a>
                            </div>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection