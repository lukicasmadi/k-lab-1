<?php

namespace App\Listeners;

use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\BackupZipWasCreated;

class MailSuccessfulDatabaseBackup
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
     * @param  SpatieBackupEventsBackupZipWasCreated  $event
     * @return void
     */
    public function handle(BackupZipWasCreated $event)
    {
        $this->mailBackupFile($event->pathToZip);
    }

    public function mailBackupFile($path)
    {
        try {
            Mail::to(env('MAIL_RECEIVER'))->send(new NotifEmail($path));
            logger("Email backup sent with path : ".$path);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
