<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = factory(Company::class,10)->make();
        Company::truncate();
        foreach($objs as $var)
        {
            Company::create($var->toArray());
        }
    }
}
