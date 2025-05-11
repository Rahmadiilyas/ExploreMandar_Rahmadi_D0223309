<?php

namespace Database\Seeders;

use App\Models\pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pengguna::create([
            'name' => 'Aminah',
            'email' => 'aminah@gmail.com',
            'password' => Hash::make('1234567890'), // Password: password123
            'role' => 'admin',
            'alamat' => 'Wonomulyo',
            'nomor_telepon' => '08123456789',
        ]);
    }
}
