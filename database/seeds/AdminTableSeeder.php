<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
