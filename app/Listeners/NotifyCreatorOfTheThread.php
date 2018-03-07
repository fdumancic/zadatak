<?php

namespace App\Listeners;

use App\Events\NoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\MailController;


class NotifyCreatorOfTheThread
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
     * @param  NoteCreated  $event
     * @return void
     */
    public function handle(NoteCreated $event)
    {
        $send_mail = new MailController;
        $send_mail->send();
    }
}
