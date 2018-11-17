<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_DETALLE_CONVENIO
 * @property int $ID_PRODUCTO
 * @property int $ID_CONVENIO
 * @property string $UNIDAD
 * @property int $CANTIDAD
 * @property int $VALOR_UNITARIO
 * @property int $TOTAL
 * @property Convenio $convenio
 * @property Producto $producto
 */
class Detalle_Convenio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_convenio';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_DETALLE_CONVENIO';

    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'ID_CONVENIO', 'UNIDAD', 'CANTIDAD', 'VALOR_UNITARIO', 'TOTAL'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convenio()
    {
        return $this->belongsTo('App\Convenio', 'ID_CONVENIO', 'ID_CONVENIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
