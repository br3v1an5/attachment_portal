<?php

namespace App\Notifications;

use App\Models\AttachmentApplication;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AttachmentSent extends Notification
{
    use Queueable;
    public $attachment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AttachmentApplication $attachment, Student $student)
    {
        $this->attachment = $attachment;
        $this->student = $student;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'notification_type' => 'Attachment Application',
            'message' => 'Hello ' . $this->student->user->name . '. We received your application data, please check your email for data received.',
        ];
    }
}
