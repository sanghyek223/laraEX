<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Seungmun\Sens\Sms\SmsChannel;
use Seungmun\Sens\Sms\SmsMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendPurchaseReceipt extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSms($notifiable)
    {
        return (new SmsMessage)
            ->to($notifiable->phone_num)
            ->from($notifiable->default_num)
            ->content($notifiable->content." [".$notifiable->confirm_num."]".$notifiable->notice)
            ->contentType('COMM')// You can ignore it (default: COMM)
            ->type('SMS');  // You can ignore it (default: SMS)
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
