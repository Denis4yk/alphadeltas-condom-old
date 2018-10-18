<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Production DB hosts
    |--------------------------------------------------------------------------
    |
    | List of production hosts, where dangerous commands are restricted.
    |
    */

    'production_db_hosts' => [],

    /*
    |--------------------------------------------------------------------------
    | DB host environment variables names
    |--------------------------------------------------------------------------
    |
    | DB host environment variables names. Normally, should be one, but added
    | ability to have many for complex multi-database setups.
    |
    */

    'db_host_variables' => [
        'DB_HOST',
    ],


    /*
    |--------------------------------------------------------------------------
    | Production ips
    |--------------------------------------------------------------------------
    |
    | List of dangerous commands' substrings.
    |
    | E.g. 'migrate' will block ALL "migrate" commands.
    |
    */

    'dangerous_commands'   => [
        'migrate:fresh',
        'migrate:reset',
        'migrate:refresh',
        'migrate:rollback',
        'db',
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed environments
    |--------------------------------------------------------------------------
    |
    | List of allowed environments, where dangerous commands can be executed.
    |
    */
    'allowed_environments' => [
        'dev',
        'local',
        'testing',
    ],

    /*
    |--------------------------------------------------------------------------
    | Log
    |--------------------------------------------------------------------------
    |
    | Log message configuration.
    |
    */

    'log' => [
        'level'   => 'alert',
        'message' => 'I\'ve just saved you. You have almost run this command at a wrong environment.',
    ],

];
