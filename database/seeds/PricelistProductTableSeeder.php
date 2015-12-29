<?php

use Illuminate\Database\Seeder;
use App\Models\PricelistProduct;

class PricelistProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = factory(PricelistProduct::class,100)->make();
        PricelistProduct::truncate();
        foreach($objs as $var)
        {
            PricelistProduct::create($var->toArray());
        }
    }
}
