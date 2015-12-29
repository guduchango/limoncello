<?php

use \App\User;
use \Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /** Sample login */
    const SAMPLE_LOGIN = 'user@example.com';

    /** Sample password */
    const SAMPLE_PASSWORD = 'password';

	/**
	 * Seeds the table.
	 *
	 * @return void
	 */
	public function run()
	{
        User::truncate();
        (new User([
            'name'     => 'Example Login',
            'email'    => self::SAMPLE_LOGIN,
            'password' => bcrypt('secret'),
        ]))->save();

        $objs = factory(User::class,10)->make();

        foreach($objs as $var)
        {
            (new User([
                'name'     => $var->name,
                'email'    => $var->email,
                'password' => bcrypt('secret'),
            ]))->save();
        }
	}
}
