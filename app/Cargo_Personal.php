<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_CARGO_PERSONAL
 * @property int $ID_CARGO
 * @property int $RUTP
 * @property string $FECHA_CARGO
 * @property Personal $personal
 * @property Cargo $cargo
 */
class Cargo_Personal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cargo_personal';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CARGO_PERSONAL';

    /**
     * @var array
     */
    protected $fillable = ['ID_CARGO', 'RUTP', 'FECHA_CARGO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal()
    {
        return $this->belongsTo('App\Personal', 'RUTP', 'RUTP');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'ID_CARGO', 'ID_CARGO');
    }
}
