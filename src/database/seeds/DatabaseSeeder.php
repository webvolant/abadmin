<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'demo@demo.com',
            'role' => '2',
            'name' => 'demo user',
            'phone' => '0(000) 00-00-00',
            'link' => 'demo',
            'password'=>'$2y$10$rYRmkapn4DlepPqTHFJF..inIvORby7N7Qo38VxhbIPotmAXiaegK',

            'description' => 'Description to User',
            'status'=>'1',
        ));
    }
}
/*
class TestTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tests')->delete();

        Test::create(array(
            'name' => 'root',
            'link' => 'root',
            'lft' => '1',
            'rgt' => '2',
            'depth'=>'0',
            'status'=>'1',
        ));

    }

}

*/