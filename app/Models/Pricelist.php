<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    protected $table = 'pricelists';

    protected $fillable = ['name', 'company_id','percent_price','percent_subdist','percent_prevent','pivot_percent_subdist'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
