<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_results';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id', 'result', 'score'
    ];
}
