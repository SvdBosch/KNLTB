<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class game extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_games';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id_1', 'participant_id_2', 'competition_id', 'played'
    ];

    // Disable the timestamps, created_at, updated_at
    public $timestamps = false;

}
