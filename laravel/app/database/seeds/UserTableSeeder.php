<?php
class UserTableSeeder extends Seeder {
	public function run() {
		$faker = Faker\Factory::create();
		$maxBranchId = count(Branch::all());

		//Static Users

		User::create(array(
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'johndoe@example.com',
			'password' => Hash::make('user'),
			'phone' => $faker->phoneNumber,
			'permission_id' => 0,
			'remember_token' => str_random(64),
			'branch_id' => 1
		));

		User::create(array(
			'first_name' => 'Jack',
			'last_name' => 'Doe',
			'email' => 'jackdoe@example.com',
			'password' => Hash::make('manager'),
			'phone' => $faker->phoneNumber,
			'permission_id' => 1,
			'remember_token' => str_random(64),
			'branch_id' => 1
		));

		User::create(array(
			'first_name' => 'Jane',
			'last_name' => 'Doe',
			'email' => 'janedoe@example.com',
			'password' => Hash::make('admin'),
			'phone' => $faker->phoneNumber,
			'remember_token' => str_random(64),
			'permission_id' => 2,
			'branch_id' => 1
		));

		//

		//200 users
		for($i = 0; $i < 200; ++$i){
			$name1 = $faker->unique->name;
			$name = explode(' ', $name1);
			if((strpos($name[0], '.') != -1) && count($name) > 2){ //Dr. Mr. ... etc
				$name[0] = $name[1];
				$name[1] = $name[2];
			}
			User::create(array(
				'first_name' => $name[0],
				'last_name' => $name[1],
				'email' => "randomtestmailer+" . $name1 . "@gmail.com",
				'password' => Hash::make('user'),
				'phone' => $faker->phoneNumber,
				'permission_id' => 0,
				'remember_token' => str_random(64),
				'branch_id' => $faker->numberBetween(1, $maxBranchId)
			));
		}
		//2 Managers
		for($i = 0; $i < 2; ++$i){
			$name1 = $faker->unique->name;
			$name = explode(' ', $name1);
			if((strpos($name[0], '.') != -1) && count($name) > 2){
				$name[0] = $name[1];
				$name[1] = $name[2];
			}
			User::create(array(
				'first_name' => $name[0],
				'last_name' => $name[1],
				'email' => "randomtestmailer+" . $name1 . "@gmail.com",
				'password' => Hash::make('manager'),
				'phone' => $faker->phoneNumber,
				'permission_id' => 1,
				'remember_token' => str_random(64),
				'branch_id' => $faker->numberBetween(1, $maxBranchId)
			));
		}
	}
}
