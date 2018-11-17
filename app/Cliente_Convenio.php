<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_cliente_convenio
 * @property int $RUT_CLIENTE
 * @property int $ID_CONVENIO
 * @property Convenio $convenio
 * @property Cliente $cliente
 */
class Cliente_Convenio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cliente_convenio';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_cliente_convenio';

    /**
     * @var array
     */
    protected $fillable = ['RUT_CLIENTE', 'ID_CONVENIO'];

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
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'RUT_CLIENTE', 'RUT_CLIENTE');
    }
}
