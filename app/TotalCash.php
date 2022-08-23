<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalCash extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'total_cashes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bank_note', 'restaurant_id', 'pieces', 'together_bank_note_pieces'];

    
}
