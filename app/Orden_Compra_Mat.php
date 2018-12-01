<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $ID_ORDEN_COMPRA
 * @property int $ID_MATERIAL
 * @property int $RUT
 * @property string $FECHA_EMISION
 * @property string $CONDICIONES_PAGO
 * @property int $VALOR_NETO
 * @property int $VALOR_TOTAL
 * @property Material $material
 * @property Proveedor $proveedor
 */
class Orden_Compra_Mat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orden_de_compra_mat';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_ORDEN_COMPRA';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['ID_IVA','RUT','ID_FACTURA','ID_PRODUCTO', 'FECHA_EMISION', 'CONDICIONES_PAGO', 'VALOR_NETO', 'VALOR_TOTAL'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    

    public function iva()
    {
        return $this->belongsTo('App\Iva', 'ID_IVA', 'ID_IVA');
    }

    public function factura_proveedors()
    {
        return $this->belongsTo('App\Proveedor', 'RUT', 'RUT');
    }
}