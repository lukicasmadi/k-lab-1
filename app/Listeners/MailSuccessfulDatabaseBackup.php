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
            // Mail::raw('You have a new database backup file.',   function ($message) use ($path) {
            //     $message->to(env('MAIL_FROM_ADDRESS'))
            //         ->subject('DB Auto-backup Done')
            //         ->attach($path);
            // });
            Mail::to('berthojoris@gmail.com')->send(new NotifEmail());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
