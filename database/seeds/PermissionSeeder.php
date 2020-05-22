<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			\App\Permission::create([
				'module' => 'members',
				'name' => 'view_members',
				'description' => 'Can view all members data',
			]);
			\App\Permission::create([
				'module' => 'members',
				'name' => 'invite_members',
				'description' => 'Can invite members by Email',
			]);
			\App\Permission::create([
				'module' => 'offers',
				'name' => 'view_offers',
				'description' => 'Can view all company offer',
			]);
			\App\Permission::create([
				'module' => 'offers',
				'name' => 'add_offer',
				'description' => 'Can create offers',
			]);
    }
}
