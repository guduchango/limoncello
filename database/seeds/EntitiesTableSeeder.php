<?php

use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = factory(Entity::class,30)->make();
        Entity::truncate();
        foreach($objs as $var)
        {
            Entity::create($var->toArray());
        }

    }
}
