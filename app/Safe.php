<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'safes';

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
    protected $fillable = ['employee_complete_name', 'restaurant_id', 'sum'];

    
}
