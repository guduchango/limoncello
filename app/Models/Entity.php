<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entities';

    protected $fillable = [
        'company_id',
        'author_id',
        'contact_name',
        'name',
        'document',
        'street_name',
        'street_number',
        'aditional_info',
        'email',
        'phone',
        'list_id',
        'provider',
        'type',
        'parent_id',
        'type',
        'tax_id',
        'observation',
        'pricelist_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class,'tax_id');
    }

    public function pricelist()
    {
        return $this->belongsTo(Pricelist::class,'pricelist_id');
    }

}
