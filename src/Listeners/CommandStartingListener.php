<?php
declare(strict_types=1);

namespace Obotoz\Condom\Listeners;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Log;
use Obotoz\Condom\Exceptions\DangerousCommandRunException;

class CommandStartingListener
{
    /**
     * Handle the event.
     *
     * @param \Illuminate\Console\Events\CommandStarting $commandStartingEvent
     *
     * @return void
     */
    public function handle(CommandStarting $commandStartingEvent): void
    {
        //if it's a potentially dangerous command
        if (str_contains($commandStartingEvent->command, config('condom.dangerous_commands'))) {
            //perform checks
            $dangerousHost = collect(config('condom.db_host_variables'))
                ->map(function ($envVarName) {
                    return env($envVarName);
                })
                ->intersect(config('condom.production_db_hosts'))
                ->isNotEmpty();

            $dangerousEnv = !app()->environment(config('condom.allowed_environments'));

            if ($dangerousHost || $dangerousEnv) {
                Log::{config('condom.log.level')}(config('condom.log.message'));

                throw new DangerousCommandRunException(config('condom.log.message'));
            }
        }
    }
}
