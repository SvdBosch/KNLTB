<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_participants';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class', 'school', 'level', 'competition_id'
    ];

}
