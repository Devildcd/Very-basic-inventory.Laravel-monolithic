<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function destinos(): HasMany
    {
        return $this->hasMany(Destino::class);
    }

    protected $fillable = [
        'categoria_id',
        'nombre',
        'precio',
        'cantidad',
        'fecha',
        'agotado'
    ];

    protected $casts = [
        'agotado'
    ];

    public static function rules()
    {
        return [
            'categoria_id' => ['required'],
            'nombre' => ['required', 'max:50'],
            'precio' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']   
        ];
    }
}
