<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
    		[
    			'name' => 'Krisztián Kadlicskó',
    			'email' => 'krisztian.kadlicsko@gmail.com',
    			'password' => Hash::make('admin1'),
    		],
    	];

    	foreach ($users as $user) {
    		$user = User::create($user);
    		factory(App\News::class, 10)->create(['user_id' => $user->id]);
    	}
    }
}
