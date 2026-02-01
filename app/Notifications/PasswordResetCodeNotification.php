<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetCodeNotification extends Notification
{
    use Queueable;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎸 Kode Verifikasi - Rock n\' Roll Store')
            ->greeting('🎸 Halo, ' . $notifiable->name . '!')
            ->line('Anda meminta reset password untuk akun Anda.')
            ->line('Gunakan kode verifikasi berikut untuk melanjutkan:')
            ->line('')
            ->line( $this->code )
            ->line('Kode ini berlaku selama 10 menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.')
            ->salutation('🎸 Salam Rock n\' Roll,')
            ->line('Tim Rock n\' Roll Store');
    }
}