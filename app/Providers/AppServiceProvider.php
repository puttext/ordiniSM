<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	$monolog=\Log::getMonolog();
    	
    	$prefisso=str_replace("handler","",php_sapi_name());
    	$handlerDebug = new RotatingFileHandler(storage_path().'/logs/'.$prefisso.'-debug.log',0,Logger::DEBUG,false,0664);
    	$handlerError = new RotatingFileHandler(storage_path().'/logs/'.$prefisso.'-error.log',0,Logger::ERROR,false,0664);
    	$handlerInfo = new RotatingFileHandler(storage_path().'/logs/'.$prefisso.'-info.log',0,Logger::INFO,false,0664);
    	$handlerAll = new RotatingFileHandler(storage_path().'/logs/'.$prefisso.'-all.log',0,\Config::get('app.log_level'),true,0664);
    	
    	$monolog->pushHandler($handlerDebug);
    	$monolog->pushHandler($handlerInfo);
    	$monolog->pushHandler($handlerError);
    	$monolog->pushHandler($handlerAll);
    	
    	/*$monolog->pushProcessor(function ($record) {
    		//$record['extra']['user'] = Auth::user() ? Auth::user()->username : 'anonymous';
    		$record['extra']['ip'] = Request::getClientIp();
    		$record['extra']['method'] = Request::method();
    		$record['extra']['path'] = Request::path();
    		 return $record;
    	});*/
    	
    		 
    	if (env("DB_LOG",true)){
			\DB::listen(function($query) {
				\Log::debug($query->sql,["parametri"=> $query->bindings, "time" => $query->time]);
			});
		}
		
		//\Carbon\Carbon::setLocale("it.utf8");
		setlocale(LC_TIME, "it_IT.utf8");
    	//
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
