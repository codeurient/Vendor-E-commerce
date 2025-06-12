<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{

    public function __construct()
    {
        //
    }


    public function handle(UserRegistered $event): void
    {
        Mail::send(new WelcomeEmail($event->email));
    }
}
