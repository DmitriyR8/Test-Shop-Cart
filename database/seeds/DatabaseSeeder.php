<?php

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
        $this->call(AdminMenuSeeder::class);
        $this->call(AdminPermissionsSeeder::class);
        $this->call(AdminRoleMenuSeeder::class);
        $this->call(AdminRolePermissionsSeeder::class);
        $this->call(AdminRolesSeeder::class);
        $this->call(AdminRoleUsersSeeder::class);
        $this->call(AdminUsersSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
