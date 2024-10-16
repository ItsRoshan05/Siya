<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'jabatan' => 'Ketua Yayasan',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // Ganti dengan password yang diinginkan
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'jabatan' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // Ganti dengan password yang diinginkan
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan pengguna lain di sini jika diperlukan
        ]);
    }
}
