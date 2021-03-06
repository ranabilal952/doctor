<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Test',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$Tk9hBu5dlvbAyYwEtzpQJetUXQ3CUOcowkQc7723hR.3FlrhxxIVW',
             'role' => 'admin'
        ]);
    }
}
