<?php

namespace App;

use App\Vote;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function votes()
    {
        return $this->belongsToMany(Vote::class);
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
