<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'prod') {
            // \URL::forceSchema('https'); // for Laravel 5.3
            \URL::forceScheme('https'); // for Laravel 5.4
        }

        if (config('logging.db_log')) {
            \DB::listen(function ($query) {
                // $sql, $bindings, $time
                if (! str_contains($query->sql, '"payload" = ?') || config('logging.db_log_full')) {
                    // se non esplicitamente richiesto ignora le query con payload (tabella sessions) per evitare dati eccessivi
                    if (config('logging.db_log_trace')) {
                        try {
                            throw new \Exception('db logging');
                        } catch (\Exception $e) {
                            // $trace_dump=array_slice($e->getTrace(), 4, 10);
                            $trace = Utilita::getTraceString($e);
                            \Log::channel('db')->debug($query->sql, ['parametri' => $query->bindings, 'time' => $query->time, 'trace' => $trace]);
                        }
                    } else {
                        \Log::channel('db')->debug($query->sql, ['parametri' => $query->bindings, 'time' => $query->time, 'trace' => 'DISABLED']);
                    }
                }
            });
        }

        Paginator::useBootstrap();

        // \Carbon\Carbon::setLocale("it.utf8");
        setlocale(LC_TIME, 'it_IT.utf8');
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }//
    }
}
