<?php
// チェック済み

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\DatabaseChannel;

class DecisionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderer, $request)
    {
        $this->orderer = $orderer;
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DatabaseChannel::class];
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
            'user_name' => $this->orderer->name,
            'param' => $this->request->board_id, // 遷移させるボードのid
            'content' => '選考の結果、「' . $this->request->w_name . '」の仕事があなたに決定しました。メッセージを送って詳細を確認しましょう。',
        ];
    }
}
