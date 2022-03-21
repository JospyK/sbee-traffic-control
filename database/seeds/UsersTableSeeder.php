<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use phpseclib\System\SSH\Agent;

class UsersTableSeeder extends Seeder
{
    public function csv_to_array($filename='', $delimiter=',')
    {
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'nom'            => "ATINDEHOU",
                'prenom'         => "MARJORY JOELLE",
                'username'       => 'matindehou',
                'email'          => 'matindehou@sbee.bj',
                'password'       => '$2y$10$1fUuYDl8J8qwgxFmDS9Kweyx1wZgPgmlrOallROC/eh8V18fs/gBO',
                'remember_token' => null,
                'matricule' => 4829,
                'direction_id' => 36,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 2,
                'nom'           => "DRH",
                'prenom'           => "DRH",
                'username'       => 'autorite',
                'email'          => 'autorite@admin.com',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 3,
                'nom'            => "Agent",
                'prenom'         => "Test",
                'username'       => 'atest',
                'email'          => "atest@sbee.bj",
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => 100001,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 4,
                'nom'            => 'AWEKPON',
                'prenom'         => 'Patrick',
                'username'       => 'pawekpon',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 5,
                'nom'            => 'GANDEBAYIN',
                'prenom'         => 'Nadege',
                'username'       => 'ngandebayin',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 6,
                'nom'            => 'LOKOSSOU',
                'prenom'         => 'Kangni',
                'username'       => 'klokossou',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 7,
                'nom'            => 'KOSSOUGBETO',
                'prenom'         => 'Cédric',
                'username'       => 'ckossougbeto',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 8,
                'nom'            => 'SEDEHO',
                'prenom'         => 'Gilbert',
                'username'       => 'gsedeho',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 9,
                'nom'            => 'HOUNKPATIN',
                'prenom'         => 'Julien',
                'username'       => 'jhounkpatin',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 10,
                'nom'            => 'SADOKO',
                'prenom'         => 'Arnaud',
                'username'       => 'asadoko',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 11,
                'nom'            => 'HOUNYE',
                'prenom'         => 'Marcel',
                'username'       => 'mhounye',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 12,
                'nom'            => 'HOUESSINON',
                'prenom'         => 'Romaric',
                'username'       => 'rhouessinon',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 13,
                'nom'            => 'DEDA',
                'prenom'         => 'Honor',
                'username'       => 'hdeda',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 14,
                'nom'            => 'BESSAN',
                'prenom'         => 'Sampara',
                'username'       => 'sbessan',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 15,
                'nom'            => 'DOSSOU',
                'prenom'         => 'Marcelin',
                'username'       => 'mdossou',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 16,
                'nom'            => 'BOILOGOUN',
                'prenom'         => 'Ghislain',
                'username'       => 'gboilogoun',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 17,
                'nom'            => 'ATINDJO',
                'prenom'         => 'Odilon',
                'username'       => 'oatindjo',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 18,
                'nom'            => 'ADANDEDJAN',
                'prenom'         => 'Assou',
                'username'       => 'aadandedjan',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 19,
                'nom'            => 'HOUNTONDJI',
                'prenom'         => 'Isae',
                'username'       => 'ihountondji',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 20,
                'nom'            => 'LOKOSSOU',
                'prenom'         => 'Constant',
                'username'       => 'clokossou',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 21,
                'nom'            => 'AVOGNON',
                'prenom'         => 'Blaise',
                'username'       => 'bavognon',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 22,
                'nom'            => 'YAYI',
                'prenom'         => 'Fabrice',
                'username'       => 'fyayi',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
            [
                'id'             => 23,
                'nom'            => 'VIDANDE',
                'prenom'         => 'Stanislas',
                'username'       => 'svidande',
                'email'          => '',
                'password'       => '$2y$10$K8I862D2V5xLLBpxiSuySes.uPtBBb4I.A1kSQZrnLlMWFZiUrtJS',
                'remember_token' => null,
                'matricule' => null,
                'direction_id' => null,
                'situation_geographique_id' => 94,
            ],
        ];

        User::insert($users);
        User::findOrFail(3)->horaires()->sync(1);

        $data = $this->csv_to_array(public_path().'/PERSONNEL.csv');

        foreach ($data as $d){
            list($nom, $prenom, $matricule, $username, $direction, $position) = explode(";", $d["nom;pren;mat;username;dir;position"]);
            $real_username = str_replace('@sbee.bj','',$username);
            try {
                $user = User::create([
                    'nom' => utf8_encode($nom),
                    'prenom' => utf8_encode($prenom),
                    'username' => str_replace('@mhi.ca','',$real_username),
                    'email' => $username,
                    'password' => '',
                    'matricule' => $matricule,
                    'direction_id' => $direction,
                    'situation_geographique_id' => $position,
                ]);
                $user->roles()->sync([3]);

            } catch (\Illuminate\Database\QueryException $th) {
                dump($d["nom;pren;mat;username;dir;position"]);
            }
        }

    }
}
