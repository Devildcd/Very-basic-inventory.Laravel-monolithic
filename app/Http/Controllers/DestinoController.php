<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinos = Destino::paginate();

        return view('destinos.index', compact('destinos'))
               ->with('i', (request()->input('page', 1) - 1) * $destinos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();

        return view('destinos.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
    $request->validate([
        'nombre' => 'required',
        'cantidad' => 'required|min:1',
        'fecha' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                // Obtener la fecha del producto
                $producto = Producto::findOrFail($request->producto_id);

                // Comparar las fechas
                if ($value < $producto->fecha) {
                    $fail('The destination date must be greater than or equal to the product date.');
                }
            },
        ],
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => [
            'required',
            Rule::exists('productos', 'cantidad')->where(function ($query) use ($request) {
                return $query->where('id', $request->producto_id)
                             ->where('cantidad', '>=', $request->cantidad);
            }),
        ],
    ]);

    // Si la validación pasa, crear el registro en la base de datos
    $destino = Destino::create($request->all());

    return redirect()->route('destinos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destino $destino)
    {
        return view('destinos.show', compact('destino'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destino $destino)
    {
        $productos = Producto::all();

        return view('destinos.edit', compact('destino', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destino $destino)
    {

        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|min:1',
            'fecha' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    // Obtener la fecha del producto
                    $producto = Producto::findOrFail($request->producto_id);

                    // Comparar las fechas
                    if ($value < $producto->fecha) {
                        $fail('The destination date must be greater than or equal to the product date.');
                    }
                },
            ],
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => [
                'required',
                Rule::exists('productos', 'cantidad')->where(function ($query) use ($request) {
                    return $query->where('id', $request->producto_id)
                        ->where('cantidad', '>=', $request->cantidad);
                }),
            ],
        ]);


        $destino->update($request->all());

        return redirect()->route('destinos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destino $destino)
    {
        $destino->delete();

        return redirect()->route('destinos.index');
    }
}
