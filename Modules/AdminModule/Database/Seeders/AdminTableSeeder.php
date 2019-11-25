<?php

namespace Modules\AdminModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Modules\AdminModule\Entities\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $super_admin=Admin::create([
            'name' => "Super Admin",
            'username' => "superadmin",
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('superadmin'),
        ]);

        Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        Role::create(['guard_name' => 'admin', 'name' => 'writer']);

        $super_admin->assignRole('superadmin');

    }
}
