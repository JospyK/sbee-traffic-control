<?php

namespace App\Observers;

use App\Models\Retard;
use App\Models\User;
use App\Notifications\NouveauRetardNotification;
use Illuminate\Support\Facades\Notification;

class RetardActionObserver
{
    public function created(Retard $model)
    {
        $user =  $model->user;
        $data  = [
            'action' => 'created',
            'model_name' => 'Retard',
            'model_id' => $model->id,
            'user_name' => $user->name,
            'user_matricule' => $user->matricule,
            'traffic_created_at' => $model->traffic->created_at
        ];
        $users = User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();

        // Notification::send($users, new NouveauRetardNotification($data));
    }
}
