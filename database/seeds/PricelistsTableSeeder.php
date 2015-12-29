<?php

use Illuminate\Database\Seeder;
use App\Models\Pricelist;

class PricelistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = factory(Pricelist::class,10)->make();
        Pricelist::truncate();
        foreach($objs as $var)
        {
            Pricelist::create($var->toArray());
        }
    }
}
