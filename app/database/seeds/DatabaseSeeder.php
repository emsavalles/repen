<?php

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
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vader = DB::table('admins')->insert([
                'username'   => 'Administrador',
                'password'   => Hash::make('tegramali'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
    }
 }