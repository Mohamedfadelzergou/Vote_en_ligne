<?php

namespace App;
use App\User;
use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function votes()
    {
        return $this->belongsToMany(Vote::class,'vote_candidat');
    }
}
