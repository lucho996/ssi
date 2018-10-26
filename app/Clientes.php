<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUT_CLIENTE
 * @property string $NOMBRE_COMPLETO
 * @property string $DIRECCION
 * @property string $CIUDAD
 * @property string $COMUNA
 * @property string $GIRO
 * @property int $TELEFONO
 * @property string $TIPO
 * @property ClienteConvenio[] $clienteConvenios
 * @property Factura[] $facturas
 * @property OrdenDeCompra[] $ordenDeCompras
 */
class Clientes extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RUT_CLIENTE';
    public $timestamps = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['RUT_CLIENTE','NOMBRE_COMPLETO', 'DIRECCION', 'CIUDAD', 'COMUNA', 'GIRO', 'TELEFONO', 'TIPO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteConvenios()
    {
        return $this->hasMany('App\ClienteConvenio', 'RUT_CLIENTE', 'RUT_CLIENTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Factura', 'RUT_CLIENTE', 'RUT_CLIENTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenDeCompras()
    {
        return $this->hasMany('App\OrdenDeCompra', 'RUT_CLIENTE', 'RUT_CLIENTE');
    }
}
