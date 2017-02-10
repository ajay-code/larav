<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Admin')->create();
        factory('App\Models\Subcategory', 10)->create();

        $user = App\User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->verified = true;
        $user->save();
    }
}
