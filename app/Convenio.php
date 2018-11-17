<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_CONVENIO
 * @property string $FECHA_INICIO
 * @property string $FECHA_TERMINO
 * @property int $TOTAL
 * @property int $NETO
 * @property ClienteConvenio[] $clienteConvenios
 * @property DetalleConvenio[] $detalleConvenios
 * @property DetalleCotizacion[] $detalleCotizacions
 */
class Convenio extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CONVENIO';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['FECHA_INICIO', 'FECHA_TERMINO', 'TOTAL', 'NETO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clienteConvenios()
    {
        return $this->hasMany('App\ClienteConvenio', 'ID_CONVENIO', 'ID_CONVENIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleConvenios()
    {
        return $this->hasMany('App\DetalleConvenio', 'ID_CONVENIO', 'ID_CONVENIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCotizacions()
    {
        return $this->hasMany('App\DetalleCotizacion', 'ID_CONVENIO', 'ID_CONVENIO');
    }
}
