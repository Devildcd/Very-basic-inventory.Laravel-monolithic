@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Categorías</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"> Editar Categoría</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form form method="POST" action="{{ route('categoria.update', $categoria->id) }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            @method('PUT')
                            @csrf
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="inputAddress" name="nombre" value="{{ $categoria->nombre }}" placeholder="*...">
                            </div>
                            
                            <div class="col-12" style="margin-top: 10px">
                              <button type="submit" class="btn btn-primary">Aceptar</button>
                              <a href="{{ route('categorias.index') }}" class="btn btn-info"><i
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