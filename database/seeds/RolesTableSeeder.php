<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Autorite',
            ],
            [
                'id'    => 3,
                'title' => 'Agent',
            ],
            [
                'id'    => 4,
                'title' => 'Garde',
            ],
        ];

        Role::insert($roles);
    }
}
