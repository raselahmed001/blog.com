<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Foundation\Auth\User;
use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::factory()->count(50)->create();
    }
}
