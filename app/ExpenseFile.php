<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseFile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expense_file';

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
    protected $fillable = ['expenses_id', 'date_of_issue', 'file'];
}
