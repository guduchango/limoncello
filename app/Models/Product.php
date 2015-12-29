<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PricelistProduct;
use App\Models\Company;
use App\Models\Pricelist;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'author_id',
        'company_id',
        'name',
        'description',
        'stock',
        'cost',
        'duration',
        'sort',
        'barcode',
        'alert_stock',
        'desired_stock',
        'price',
        'percent_subdist',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function pricelists()
    {
        return $this->belongsToMany(Pricelist::class,'pricelist_product')->withPivot('price','percent_subdist','percent_prevent');
    }

    public function prices()
    {
       return  $this->hasMany(PricelistProduct::class,'product_id','id');
    }

}
