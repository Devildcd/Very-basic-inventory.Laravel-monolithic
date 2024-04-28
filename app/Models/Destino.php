<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destino extends Model
{
    use HasFactory;

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    protected $fillable = [
        'producto_id',
        'nombre',
        'cantidad',
        'fecha',
    ];

    public static function rules()
    {
        return [
            'nombre' => ['required'],
            'cantidad' => ['required'],
            'fecha' => ['required'],
            'cantidad' => ['required'],
        ];
    }
    
}
