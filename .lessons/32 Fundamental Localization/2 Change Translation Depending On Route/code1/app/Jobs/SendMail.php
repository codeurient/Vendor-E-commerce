<?php
namespace App\Jobs;


use App\Mail\PostPublished;
use Illuminate\Support\Facades\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        
    }

    public function handle(): void
    {
        Mail::send( new PostPublished() );
    }
}