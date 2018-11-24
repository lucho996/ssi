<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_DETALLE_OC
 * @property int $ID_MATERIAL
 * @property int $RUT
 * @property string $ID_ORDEN_COMPRA
 * @property int $CANTIDAD
 * @property int $PRECIO_UNITARIO
 * @property int $TOTAL
 * @property Convenio $material
 * @property Producto $proveedor
 * @property Producto $orden_de_compra_mat
 */
class OC_detalle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'oc_detalle';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_DETALLE_OC';

    /**
     * @var array
     */
    protected $fillable = ['ID_MATERIAL', 'RUT', 'CANTIDAD', 'PRECIO_UNITARIO', 'TOTAL'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo('App\Material', 'ID_MATERIAL', 'ID_MATERIAL');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'RUT', 'RUT');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orden_de_compra_mat()
    {
        return $this->belongsTo('App\Orden_de_compra_mat', 'ID_ORDEN_COMPRA', 'ID_ORDEN_COMPRA');
    }
}
