<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Unit;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset database
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('team_user')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Array teams
        $teams = [
            'team-a',
            'team-b',
        ];

        // Create Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('@Iamsuperadmin'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super_admin');

        // Loop untuk setiap team
        foreach ($teams as $teamSlug) {
            $team = Team::where('slug', $teamSlug)->first();

            if (!$team) {
                continue;
            }

            // Attach super admin ke semua team
            $superAdmin->teams()->attach($team->id);
        }

        // Create Admin OPD untuk setiap team
        $adminOpd = User::create([
            'name' => "Admin {$team->name}",
            'email' => "admin{$teamSlug}@gmail.com",
            'password' => bcrypt('adminteam'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        $adminOpd->assignRole('admin_opd');
        $adminOpd->teams()->attach($team->id);
    }
}