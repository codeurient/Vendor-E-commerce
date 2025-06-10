<?php
namespace App\Observers;

use App\Models\Post;

use App\Jobs\SendMail;

class PostObserver
{
    public function created(Post $post): void
    {
        SendMail::dispatch();
    }

    public function updated(Post $post): void
    {
        
    }

    public function deleted(Post $post): void
    {
        
    }

    public function restored(Post $post): void
    {
        
    }

    public function forceDeleted(Post $post): void
    {
        
    }
}
