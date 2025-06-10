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

    public $userEmail = '';

    public function __construct($email)
    {
        $this->userEmail = $email;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->userEmail,
            subject: 'Welcome to our site',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
