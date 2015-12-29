<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SitesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(CompaniesTableSeeder::class);
        $this->call(EntitiesTableSeeder::class);
        $this->call(PricelistsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PricelistProductTableSeeder::class);

        Model::reguard();
    }
}
