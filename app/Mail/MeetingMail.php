<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $meetingId,$joinUrl,$password,$interviewTime;
    /**
     * Create a new message instance.
     */
    public function __construct($meetingId,$joinUrl,$password,$interviewTime)
    {
        //
        $this->meetingId = $meetingId;
        $this->joinUrl = $joinUrl;
        $this->password = $password;
        $this->interviewTime = $interviewTime;
     }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your interview has been schedule this is the zoom meeting information...',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.meeting',
            with:[
                'meetingId' => $this->meetingId,
                'joinUrl' => $this->joinUrl,
                'password' => $this->password,
                'interviewTime' => $this->interviewTime,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
