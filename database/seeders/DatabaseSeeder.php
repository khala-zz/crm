<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        

        // insert sample user as the system admin
        DB::table('users')->insert([
           'name' => 'admin',
           'email' => 'dokhaclam@gmail.com',
           'position_title' => 'sales manager',
           'is_admin' => 1,
           'is_active' => 1
        ]);

        // insert the initial permissions
        $permissions = [];
        foreach (config('seed_data.permissions') as $value) {
            $permissions[] = \Spatie\Permission\Models\Permission::create(['name' => $value]);
        }
    }
}
