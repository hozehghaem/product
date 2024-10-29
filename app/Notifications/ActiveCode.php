<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\GhasedakChannel;


class ActiveCode extends Notification
{
    use Queueable;

    public $code;

    public $phone;
    /**
     * Create a new notification instance.
     */
    public function __construct($code , $phone)
    {
        $this->code = $code;
        $this->phone = $phone;
    }

    public static function verifyCode(mixed $token, $user)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [GhasedakChannel::class];

//        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
//    public function toMail(object $notifiable): MailMessage
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }
    public function toGhasedakSms($notifiable)
    {
        return [
            'text' => " code: {$this->code} \n \n کد اختصاصی شما برای ورود به وبسایت بستا ",
            'phone' => $this->phone,
            'code' => $this->code
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
