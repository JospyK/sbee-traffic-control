<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TemperatureNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(config('app.name') . ': Température anormale enregistrée.')
            ->greeting('Bonjour,')
            ->line('Nous voudrions vous informer d\'une température anormale : '. $this->data['temperature'])
            ->line('Température : ' . $this->data['temperature'])
            ->line('Agent : ' . $this->data['user_name'])
            ->line('Matricule : '. $this->data['user_matricule'])
            ->line('Date : '. $this->data['traffic_created_at'])
            ->line('Vous pouvez cliquer sur le lien suivant pour consulter les informations relatives à ce traffic.')
            ->action("Voir les informations", route('admin.traffic.show', $this->data['model_id']))
            ->salutation('Cordialement');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
