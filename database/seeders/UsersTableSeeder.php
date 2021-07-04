<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use App\Tenant\Events\TenantCreated;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(10)->create();
        $tenant = Tenant::first();

        $user = $tenant->users()->create([
            'name' => 'André Freitas',
            'email' => 'proandre21@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        event(new TenantCreated($user));
    }
}
