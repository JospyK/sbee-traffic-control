<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouveauRetardNotification extends Notification
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
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject(config('app.name') . ': Retard enregistré.')
            ->greeting('Bonjour,')
            ->line('Nous voudrions vous notifier un nouveau retard.')
            ->line('Agent : ' . $this->data['user_name'])
            ->line('Matricule : '. $this->data['user_matricule'])
            ->line('Date : '. $this->data['traffic_created_at'])
            ->line('Vous pouvez cliquer sur le lien suivant pour consulter les informations relatives à ce retard.')
            ->action("Voir les informations", route('admin.retards.show', $this->data['model_id']))
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
