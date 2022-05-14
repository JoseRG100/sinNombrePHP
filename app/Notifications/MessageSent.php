<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class MessageSent extends Notification
{
    protected $message;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($notifiable->name.",")
                    ->error()
                    ->subject('¡Has recibido un mensaje desde tu sitio web!')
                    ->line('¡Has recibido un mensaje!')
                    ->action('Click aquí para ver el mensaje', route('messages.show', $this->message->id))
                    ->line('Gracias por utilizar nuestra aplicación!');
        // return (new MailMessage)->view(
        //     'emails.notification',[
        //     'msg'=> $this->message,
        //     'user'=>  $notifiable
        // ])->subject('Mensaje recibido desde la aplicacion de DAW');
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
            'link' => route('messages.show', $this->message->id),
            'text' => "Has recibido un mensaje de " . $this->message->sender->name
        ];
    }
}
