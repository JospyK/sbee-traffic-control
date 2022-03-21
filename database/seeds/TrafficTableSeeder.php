<?php

use App\Models\Traffic;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class TrafficTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();
        $time = Carbon::now()->toTimeString();

        foreach (range(0, 1) as $index) { //2000
            $traffics = [];

            foreach (range(0, 1000) as $index) { // 10000
                $traffics[] = [
                    'entre' => $time,
                    'sortie' => $time,
                    'temperature' => rand(28, 38),
                    'user_id' => rand(3, 4),
                    'created_at'             => Carbon::yesterday(),
                    'updated_at'             => $date
                ];
            }
            Traffic::insert($traffics);
            dump("ajout en cours");
        }
        // best resource ever
        // https://www.programmersought.com/article/6143921579/
        // benchmark 10 * 10000
        // $traffics = factory(Traffic::class, 2000000)->create();
    }
}
