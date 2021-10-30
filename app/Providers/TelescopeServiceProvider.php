<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\Telescope;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        // Telescope::tag(function (IncomingEntry $entry) {

        //     if ($entry->type === EntryType::EXCEPTION) {
        //         $entry->tags([
        //             $entry->content['class'],
        //         ]);
        //     }

        //     if ($entry->type === EntryType::MAIL) {
        //         $entry->tags([
        //             $entry->content['mailable'],
        //         ]);
        //     }

        //     if ($entry->type === EntryType::REQUEST) {
        //         $entry->tags([
        //             $entry->content['uri'],
        //             $entry->content['method'],
        //             $entry->content['response_status'],
        //             $entry->content['controller_action'],
        //         ]);
        //     }

        //     if ($entry->type === EntryType::VIEW) {
        //         $entry->tags([
        //             $entry->content['path'],
        //         ]);
        //     }

        //     if ($entry->type === EntryType::MODEL) {
        //         $entry->tags([
        //             $entry->content['model'],
        //             $entry->content['action'],
        //         ]);
        //     }

        //     return true;
        // });

        Telescope::filter(function (IncomingEntry $entry) {
            // if ($this->app->environment('local')) {
            //     return true;
            // }
            return true;

            return $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->hasMonitoredTag();
        });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     *
     * @return void
     */
    protected function hideSensitiveRequestDetails()
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'berthojoris@gmail.com',
            ]);
        });
    }
}
