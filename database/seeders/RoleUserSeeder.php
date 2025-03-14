<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ManagementAccess\RoleUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::findOrFail(1)->role()->sync(1);
    }
}
