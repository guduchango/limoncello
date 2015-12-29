<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Pricelist;

class PricelistProduct extends Model
{
    protected $table = 'pricelist_product';

    protected $fillable =
        ['product_id','pricelist_id','price','currency_id','percent_subdist','percent_prevent'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function pricelist(){
        return $this->belongsTo(Pricelist::class,'pricelist_id');
    }

}
