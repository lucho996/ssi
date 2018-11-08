<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_CARGO
 * @property string $CARGO
 * @property string $DESCRIPCION
 * @property CargoPersonal[] $cargoPersonals
 */
class Cargo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cargo';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CARGO';

    /**
     * @var array
     */
    protected $fillable = ['CARGO', 'DESCRIPCION'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargoPersonals()
    {
        return $this->hasMany('App\CargoPersonal', 'ID_CARGO', 'ID_CARGO');
    }
    public function personals()
    {
        return $this->belongsToMany('App\Personal','cargo_personal','RUTP', 'CARGO_ID')
        ->withPivot('FECHA_CARGO');
    }
}
