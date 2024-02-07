<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Team;
use App\Models\User;

class UserAddedToTeamNotification extends Notification
{
    use Queueable;

    protected $team;
    protected $addedUser;

    /**
     * Create a new notification instance.
     */
    public function __construct(Team $team, User $addedUser)
    {
        $this->team = $team;
        $this->addedUser = $addedUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $addedUserName = $this->addedUser->name;
        $addedByUserName = $notifiable->name; // Nom de l'utilisateur ayant ajouté
        $addedAt = now()->format('Y-m-d H:i:s'); // Date et heure de l'ajout
        $team = $this->team->name;

        return (new MailMessage)
                    // ->line('Nouvel utilisateur ajouté à l\'équipe ' . $this->team->name)
                    // ->line('Nouvel utilisateur : ' . $this->addedUser->name)
                    // ->action('Voir l\'équipe', url('/teams/' . $this->team->id))
                    // ->line('Merci de faire partie de notre équipe !');
                    ->subject(__('mail.user_added_subject'))
                    ->line(__('mail.user_added_content', [
                        'addedUserName' => $addedUserName,
                        'addedByUserName' => $addedByUserName,
                        'addedAt' => $addedAt,
                        'team' => $team,
                    ]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'addedUser' => $this->addedUser,
            'team' => $this->team,
            'date' => date("j, n, Y"),
            'hour' => date("H:i:s"),
        ];
    }
}
