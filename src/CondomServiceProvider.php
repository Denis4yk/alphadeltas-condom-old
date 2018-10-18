<?php
declare(strict_types=1);

namespace Obotoz\Condom;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Obotoz\Condom\Listeners\CommandStartingListener;

class CondomServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        Event::listen(CommandStarting::class, CommandStartingListener::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/condom.php', 'condom');
    }
}
