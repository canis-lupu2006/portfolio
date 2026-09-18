<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (! is_writable('/tmp')) {
            return;
        }

        $storage = '/tmp/laravel';

        foreach ([
            $storage.'/app',
            $storage.'/framework/cache/data',
            $storage.'/framework/sessions',
            $storage.'/framework/views',
            $storage.'/logs',
        ] as $dir) {
            if (! is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
        }

        $this->app->useStoragePath($storage);
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
