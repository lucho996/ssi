<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_PRODUCTO
 * @property int $RUT_CLIENTE
 * @property string $DESCRIPCION
 * @property int $COD_PETICION_OFERTA
 * @property string $TIPO_PRODUCTO
 * @property string $PLANO_PRODUCTO
 * @property string $FECHA_LLEGADA
 * @property string $FECHA_RESPUESTA_COTIZACION
 * @property string $FECHA_DE_ENTREGA_PRODUCTO
 * @property string $ESTADO
 * @property int $UTILIDADES
 * @property int $GASTOS_GENERALES
 * @property int $TOTAL
 * @property DetalleConvenio[] $detalleConvenios
 * @property DetalleCotizacion[] $detalleCotizacions
 * @property DetalleGuiaDespacho[] $detalleGuiaDespachos
 * @property EquipoYOHerramientaArrendado[] $equipoYOHerramientaArrendados
 * @property EquiposYOHerramienta[] $equiposYOHerramientas
 * @property ManoDeObra[] $manoDeObras
 * @property Material[] $materials
 * @property OrdenTrabajo[] $ordenTrabajos
 */
class Producto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'producto';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_PRODUCTO';

    /**
     * @var array
     */
    protected $fillable = ['RUT_CLIENTE', 'DESCRIPCION', 'COD_PETICION_OFERTA', 'TIPO_PRODUCTO', 'PLANO_PRODUCTO', 'FECHA_LLEGADA', 'FECHA_RESPUESTA_COTIZACION', 'FECHA_DE_ENTREGA_PRODUCTO', 'ESTADO', 'UTILIDADES', 'GASTOS_GENERALES', 'TOTAL'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleConvenios()
    {
        return $this->hasMany('App\DetalleConvenio', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCotizacions()
    {
        return $this->hasMany('App\DetalleCotizacion', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleGuiaDespachos()
    {
        return $this->hasMany('App\DetalleGuiaDespacho', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipoYOHerramientaArrendados()
    {
        return $this->hasMany('App\EquipoYOHerramientaArrendado', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equiposYOHerramientas()
    {
        return $this->hasMany('App\EquiposYOHerramienta', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manoDeObras()
    {
        return $this->hasMany('App\ManoDeObra', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\Material', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenTrabajos()
    {
        return $this->hasMany('App\OrdenTrabajo', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
