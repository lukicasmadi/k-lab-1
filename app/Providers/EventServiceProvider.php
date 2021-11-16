<?php

namespace App\Providers;

use App\Models\Polda;
use App\Models\RencanaOperasi;
use App\Observers\PHROObserver;
use App\Models\JenisPelanggaran;
use App\Observers\PoldaObserver;
use Illuminate\Support\Facades\Event;
use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Auth\Events\Registered;
use App\Observers\RencanaOperasiObserver;
use App\Observers\JenisPelanggaranObserver;
use Spatie\Backup\Events\BackupZipWasCreated;
use App\Listeners\MailSuccessfulDatabaseBackup;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BackupZipWasCreated::class => [
            MailSuccessfulDatabaseBackup::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Polda::observe(PoldaObserver::class);
        JenisPelanggaran::observe(JenisPelanggaranObserver::class);
        RencanaOperasi::observe(RencanaOperasiObserver::class);
        PoldaHasRencanaOperasi::observe(PHROObserver::class);
    }
}
