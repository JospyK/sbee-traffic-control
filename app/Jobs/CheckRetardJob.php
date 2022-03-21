<?php

namespace App\Jobs;

use App\Models\Retard;
use App\Models\Traffic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckRetardJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $traffic;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $traffic)
    {
        $this->user = $user;
        $this->traffic = $traffic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $traffic = $this->traffic;

        if($user->horaires->count()) {
            if(Traffic::where('user_id', $user->id)->whereDate('created_at', today())->get()->count() == 1) {
                // verifier retard
                $horaire_normal = Carbon::parse($user->horaires->first()->arrivee)->addMinutes(5);
                $heure_arrivee = Carbon::parse($traffic->entre);


                # dd($horaire_normal, $heure_arrivee, $user->horaires->first()->arrivee);
                if($heure_arrivee->gt($horaire_normal)){
                    #dd($horaire_normal, $heure_arrivee);
                    $retard_en_minutes = $heure_arrivee->diffInMinutes($horaire_normal);
                    Retard::create([
                        'user_id' => $user->id,
                        'duree' => $retard_en_minutes,
                        'traffic_id' => $traffic->id
                    ]);
                }
            }
        }
    }
}
