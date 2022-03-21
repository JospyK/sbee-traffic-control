<?php

use App\Models\Horaire;
use Illuminate\Database\Seeder;

class HorairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $horaires = [
            [
                'id'             => 1,
                'arrivee'           => '07:00:00',
                'depart'          => '12:00:00',
                'name'          => '07:00 - 12:00',
            ],
            [
                'id'             => 2,
                'arrivee'           => '07:30:00',
                'depart'          => '12:00:00',
                'name'          => '07:30 - 12:00',
            ],
            [
                'id'             => 3,
                'arrivee'           => '08:00:00',
                'depart'          => '12:00:00',
                'name'          => '08:00 - 12:00',
            ],
            [
                'id'             => 4,
                'arrivee'           => '13:00:00',
                'depart'          => '16:00:00',
                'name'          => '13:00 - 16:00',
            ],
            [
                'id'             => 5,
                'arrivee'           => '13:00:00',
                'depart'          => '16:30:00',
                'name'          => '13:00 - 16:30',
            ],
            [
                'id'             => 6,
                'arrivee'           => '13:00:00',
                'depart'          => '17:00:00',
                'name'          => '13:00 - 17:00',
            ],
        ];
        Horaire::insert($horaires);
    }
}
