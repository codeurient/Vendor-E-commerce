<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Attachment;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: 'test@example.com',
            subject: 'Order Shipped',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-shipped',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('/storage/uploads/1747857651_image3.jpg')),
        ];
    }
}