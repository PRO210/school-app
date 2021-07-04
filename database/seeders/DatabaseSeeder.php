<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PlansTableSeeder::class,
            TenantsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            DocumentosTableSeeder::class,
            ColorsTableSeeder::class,
            TurmasTableSeeder::class,
            CategoriesTableSeeder::class,
            TurnosTableSeeder::class,
            ClassificationsTableSeeder::class,
            SolicitationsTableSeeder::class,
            ArchivesTableSeeder::class,
        ]);
    }
}
