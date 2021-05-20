<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $records = [
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Dashboard',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Admin',
                'icon' => 'fa-tasks',
                'uri' => '/',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 2,
                'order' => 3,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 2,
                'order' => 4,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 2,
                'order' => 5,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 2,
                'order' => 6,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 2,
                'order' => 7,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Products',
                'icon' => 'fa-align-left',
                'uri' => '/products',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Users',
                'icon' => 'fa-align-left',
                'uri' => '/users',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Orders',
                'icon' => 'fa-align-left',
                'uri' => '/orders',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Shipping',
                'icon' => 'fa-align-left',
                'uri' => '/shippings',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Addresses',
                'icon' => 'fa-align-left',
                'uri' => '/addresses',
                'permission' => null,
                'created_at' => null,
                'updated_at' => null
            ]
        ];
        if (DB::table('admin_menu')->get()->count() == 0) {
            DB::table('admin_menu')->insert($records);
        } else {
            throw new Exception('The table is not empty, therefore it cannot be filled!', 500);
        }

    }
}
