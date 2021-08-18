<?php

namespace App;

use App\Voter;
use App\Candidat;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function voters()
    {
        return $this->belongsToMany(Voter::class);
    }
    public function candidats()
    {
        return $this->belongsToMany(Candidat::class,'vote_candidat');
    }
}
