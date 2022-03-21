<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        // $user_permissions = $admin_permissions->filter(function ($permission) {
        //     return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        // });
        // Role::findOrFail(2)->permissions()->sync($user_permissions);

        $default_permissions = [
            "agent" => [
                'user_show', 'user_access', 'user_alert_show', 'user_alert_access', 'traffic_show', 'traffic_access', 'horaire_show', 'horaire_access', 'retard_show', 'retard_access', 'profile_password_edit',
            ],
            "garde" => [
                    'user_show', 'traffic_access', 'traffic_create', 'traffic_edit', 'profile_password_edit',
                ],
            "autorite" => [
                    'user_management_access', 'role_show', 'role_access', 'user_show', 'user_access', 'user_alert_create', 'user_alert_show', 'user_alert_delete', 'user_alert_access', 'traffic_show', 'traffic_access', 'horaire_show', 'horaire_access', 'retard_show', 'retard_access', 'profile_password_edit', 'btn_access',
                ],
            ];

            $autorite_permissions = $admin_permissions->filter(function ($permission) use ($default_permissions) {
                return in_array($permission->title, $default_permissions['autorite']);
            });
            Role::findOrFail(2)->permissions()->sync($autorite_permissions);


            $agent_permissions = $admin_permissions->filter(function ($permission) use ($default_permissions) {
                return in_array($permission->title, $default_permissions['agent']);
            });
            Role::findOrFail(3)->permissions()->sync($agent_permissions);


            $garde_permissions = $admin_permissions->filter(function ($permission) use ($default_permissions) {
                return in_array($permission->title, $default_permissions['garde']);
            });
            Role::findOrFail(4)->permissions()->sync($garde_permissions);

    }
}
