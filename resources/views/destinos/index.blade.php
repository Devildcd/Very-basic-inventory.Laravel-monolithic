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
                        <h3 class="text-center"> Listado de Destinos</h3>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('destino.create') }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i> Crear </a></h1>
                            
                        </div>

                       
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Fecha de Entrada</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destinos as $destino )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $destino->nombre }}</td>
                                        <td>{{ $destino->fecha }}</td>
                                        <td>{{ $destino->producto->nombre }}</td>
                                        <td>{{ $destino->cantidad }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('destino.edit', ['destino' => $destino->id]) }}" class="btn btn-sm btn-primary" style="margin-right: 5px"><i class="fa fa-fw fa-edit"></i></a>
                                                <form action="{{ route('destino.destroy', $destino->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection