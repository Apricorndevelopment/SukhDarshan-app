<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;
    public $sub;
    public $fname;
    public $lname;

    /**
     * Create a new message instance.
     */
    public function __construct($msg, $subject, $first_name, $last_name)
    {
        $this->msg = $msg;
        $this->sub = $subject;
        $this->fname = $first_name;
        $this->lname = $last_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contactus',
            with: [
                'msg' => $this->msg,
                'subject' => $this->sub,
                'first_name' => $this->fname,
                'last_name' => $this->lname,
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
