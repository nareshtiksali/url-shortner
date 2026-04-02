<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create company first
         $company = Company::create([
            'name' => 'Default Company',
            'email' => 'defaultOrg@hotmail.com'
        ]);

    // Get SuperAdmin role
    $role = Role::where('name', 'superadmin')->first();

    // Create user
    User::create([
        'name' => 'Super Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('admin@123'),
        'company_id' => $company->id,
        'role_id' => $role->id,
        'parent_id' => 0,
        ]);
    }
}
