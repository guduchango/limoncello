<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = factory(Product::class,30)->make();
        Product::truncate();
        foreach($objs as $var)
        {
            Product::create($var->toArray());
        }
    }
}
