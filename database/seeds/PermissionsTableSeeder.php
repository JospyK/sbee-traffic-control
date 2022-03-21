<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '23',
                'title' => 'traffic_create',
            ],
            [
                'id'    => '24',
                'title' => 'traffic_edit',
            ],
            [
                'id'    => '25',
                'title' => 'traffic_show',
            ],
            [
                'id'    => '26',
                'title' => 'traffic_delete',
            ],
            [
                'id'    => '27',
                'title' => 'traffic_access',
            ],
            [
                'id'    => '28',
                'title' => 'horaire_create',
            ],
            [
                'id'    => '29',
                'title' => 'horaire_edit',
            ],
            [
                'id'    => '30',
                'title' => 'horaire_show',
            ],
            [
                'id'    => '31',
                'title' => 'horaire_delete',
            ],
            [
                'id'    => '32',
                'title' => 'horaire_access',
            ],
            // [
            //     'id'    => '33',
            //     'title' => 'retard_create',
            // ],
            [
                'id'    => '34',
                'title' => 'retard_edit',
            ],
            [
                'id'    => '35',
                'title' => 'retard_show',
            ],
            [
                'id'    => '36',
                'title' => 'retard_delete',
            ],
            [
                'id'    => '37',
                'title' => 'retard_access',
            ],
            [
                'id'    => '38',
                'title' => 'team_create',
            ],
            [
                'id'    => '39',
                'title' => 'team_edit',
            ],
            [
                'id'    => '40',
                'title' => 'team_show',
            ],
            [
                'id'    => '41',
                'title' => 'team_delete',
            ],
            [
                'id'    => '42',
                'title' => 'team_access',
            ],
            [
                'id'    => '43',
                'title' => 'agents_present_access',
            ],
            [
                'id'    => '44',
                'title' => 'situation_geographique_create',
            ],
            [
                'id'    => '45',
                'title' => 'situation_geographique_edit',
            ],
            [
                'id'    => '46',
                'title' => 'situation_geographique_show',
            ],
            [
                'id'    => '47',
                'title' => 'situation_geographique_delete',
            ],
            [
                'id'    => '48',
                'title' => 'situation_geographique_access',
            ],
            [
                'id'    => '49',
                'title' => 'direction_create',
            ],
            [
                'id'    => '50',
                'title' => 'direction_edit',
            ],
            [
                'id'    => '51',
                'title' => 'direction_show',
            ],
            [
                'id'    => '52',
                'title' => 'direction_delete',
            ],
            [
                'id'    => '53',
                'title' => 'direction_access',
            ],
            [
                'id'    => '54',
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => '55',
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => '56',
                'title' => 'dashboard_access',
            ],
            [
                'id'    => '57',
                'title' => 'btn_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
