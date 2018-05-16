<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_scores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id', 'played', 'won', 'lost', 'points'
    ];

    public function participant()
    {
        return $this->belongsTo(App\Participant);
    }
}