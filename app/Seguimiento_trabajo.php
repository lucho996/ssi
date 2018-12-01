<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento_trabajo extends Model
{
       /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'seguimiento_trabajo';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_SEGUIMIENTO';

    /**
     * @var array
     */
    protected $fillable = ['ID_OT', 'ESTADO','DESCRIPCION','FECHA'];

   
    public function producto()
    {
        return $this->hasMany('App\Orden_trabajo', 'ID_OT', 'ID_OT');
    }
}
