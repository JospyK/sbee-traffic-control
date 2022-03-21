<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->roles()->sync(1);
        User::findOrFail(2)->roles()->sync(2);
        User::findOrFail(3)->roles()->sync(3);
        User::findOrFail(5)->roles()->sync(4);
        User::findOrFail(4)->roles()->sync(4);
        User::findOrFail(6)->roles()->sync(4);
        User::findOrFail(7)->roles()->sync(4);
        User::findOrFail(8)->roles()->sync(4);
        User::findOrFail(9)->roles()->sync(4);
        User::findOrFail(10)->roles()->sync(4);
        User::findOrFail(11)->roles()->sync(4);
        User::findOrFail(12)->roles()->sync(4);
        User::findOrFail(13)->roles()->sync(4);
        User::findOrFail(14)->roles()->sync(4);
        User::findOrFail(15)->roles()->sync(4);
        User::findOrFail(16)->roles()->sync(4);
        User::findOrFail(17)->roles()->sync(4);
        User::findOrFail(18)->roles()->sync(4);
        User::findOrFail(19)->roles()->sync(4);
        User::findOrFail(20)->roles()->sync(4);
        User::findOrFail(21)->roles()->sync(4);
        User::findOrFail(22)->roles()->sync(4);
        User::findOrFail(23)->roles()->sync(4);

    }
}
