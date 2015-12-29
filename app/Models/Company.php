<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name','user_id','abbreviation','description','logo_extension','street_name','street_number','phone'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    

}
