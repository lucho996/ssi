<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_IVA
 * @property int $IVA
 * @property string $FECHA
 * @property string $ESTADO
 * @property Cotizacion[] $cotizacions
 */
class Iva extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'iva';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_IVA';

    /**
     * @var array
     */
    protected $fillable = ['IVA', 'FECHA', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cotizacions()
    {
        return $this->hasMany('App\Cotizacion', 'ID_IVA', 'ID_IVA');
    }

    public function orden_compta_mats()
    {
        return $this->hasMany('App\Orden_Compra_Mat', 'ID_IVA', 'ID_IVA');
    }
}
