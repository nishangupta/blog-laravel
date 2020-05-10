<?php

namespace App\Listeners;

use App\Events\UserCommentedOnBlog;
use App\Notifications\BlogComment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserOnComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCommentedOnBlog  $event
     * @return void
     */
    public function handle(UserCommentedOnBlog $event)
    {
        $blogCreator = $event->comment->blog->user;
        $blogCreator->notify(new BlogComment($event->userName));
    }
}
