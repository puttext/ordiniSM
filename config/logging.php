<?php

use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [
		
		/*
		 |--------------------------------------------------------------------------
		 | Default Log Channel
		 |--------------------------------------------------------------------------
		 |
		 | This option defines the default log channel that gets used when writing
		 | messages to the logs. The name specified in this option should match
		 | one of the channels defined in the "channels" configuration array.
		 |
		 */
		
		'default' => env('LOG_CHANNEL', 'stack'),
		
		/*
		 |--------------------------------------------------------------------------
		 | Log Channels
		 |--------------------------------------------------------------------------
		 |
		 | Here you may configure the log channels for your application. Out of
		 | the box, Laravel uses the Monolog PHP logging library. This gives
		 | you a variety of powerful log handlers / formatters to utilize.
		 |
		 | Available Drivers: "single", "daily", "slack", "syslog",
		 |                    "errorlog", "monolog",
		 |                    "custom", "stack"
		 |
		 */
		
		'channels' => [
				'stack' => [
						'driver' => 'stack',
						'channels' => ['daily-full','daily-error','daily-info','daily-debug'],
						'ignore_exceptions' => false,
				],
				
				'stack-info' => [
						'driver' => 'stack',
						'channels' => ['daily-full','daily-error','daily-info'],
						'level' => 'info',
				],
				
				'stack-warning' => [
						'driver' => 'stack',
						'channels' => ['daily-full','daily-error'],
						'level' => 'warning',
				],
				
				'single' => [
						'driver' => 'single',
						'path' => storage_path('logs/laravel.log'),
						'level' => 'debug',
				],
				
				'daily-full' => [
						'driver' => 'daily',
						'path' => storage_path('logs/full.log'),
						//'level' => 'debug',
						'days' => 14,
						'permission' => 0664
				],
				
				'daily-error' => [
						'driver' => 'daily',
						'bubble' => false,
						'path' => storage_path('logs/error.log'),
						'level' => 'warning',
						'days' => 14,
						'permission' => 0664
				],
				
				'daily-info' => [
						'driver' => 'daily',
						'bubble' => false,
						'path' => storage_path('logs/info.log'),
						'level' => 'info',
						'days' => 14,
						'permission' => 0664
				],
				
				'daily-debug' => [
						'driver' => 'daily',
						'bubble' => false,
						'path' => storage_path('logs/debug.log'),
						'level' => 'debug',
						'days' => 14,
						'permission' => 0664
				],
				
				'db' => [
						'driver' => 'daily',
						'path' => storage_path('logs/db.log'),
						'level' => 'debug',
						'days' => 14,
						'permission' => 0664
				],
				
				'slack' => [
						'driver' => 'slack',
						'url' => env('LOG_SLACK_WEBHOOK_URL'),
						'username' => 'Laravel Log',
						'emoji' => ':boom:',
						'level' => 'critical',
				],
				
				'papertrail' => [
						'driver' => 'monolog',
						'level' => 'debug',
						'handler' => SyslogUdpHandler::class,
						'handler_with' => [
								'host' => env('PAPERTRAIL_URL'),
								'port' => env('PAPERTRAIL_PORT'),
						],
				],
				
				'stderr' => [
						'driver' => 'monolog',
						'handler' => StreamHandler::class,
						'formatter' => env('LOG_STDERR_FORMATTER'),
						'with' => [
								'stream' => 'php://stderr',
						],
				],
				
				'syslog' => [
						'driver' => 'syslog',
						'level' => 'debug',
				],
				
				'errorlog' => [
						'driver' => 'errorlog',
						'level' => 'debug',
				],
		],
		
		'db_log' => env('DB_LOG',true),
		'db_log_full' => env('DB_LOG_FULL',false),	//logga anche le query con payload
		'db_log_trace' => env('DB_LOG_TRACE',false), //aggiunge il trace della chiamata al database
];
