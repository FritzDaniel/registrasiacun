<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Admin",
            'email' => "admin@acundigital.com",
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()
        ]);    
    }
}
