<?php

use App\Panitia;
use Illuminate\Database\Seeder;

class PanitiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Panitia::create([
            'name' => 'Panitia Sofi',
            'email' => 'panitiasofi@gmail.com',
            'username' => 'panitiasofi',
            'password' => bcrypt(12345678),
            'decrypt' => '12345678',
        ]);
    }
}
