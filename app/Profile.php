<?php
use App\User;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
