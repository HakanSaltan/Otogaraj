<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\LogRegisteredUser',
        ],

        // 'Illuminate\Auth\Events\Attempting' => [
        //     'App\Listeners\LogAuthenticationAttempt',
        // ],

        // 'Illuminate\Auth\Events\Authenticated' => [
        //     'App\Listeners\LogAuthenticated',
        // ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],

        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\LogFailedLogin',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\LogLockout',
        ],

        'Illuminate\Auth\Events\PasswordReset' => [
            'App\Listeners\LogPasswordReset',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(\Illuminate\Auth\Events\Login::class, function ($event) {
            LogLogin::insert(
                [
                  "user_id"=>"{$event->user->id}",
                  "aciklama"=>"{$event->user->name} Giriş Yaptı",
                  "islem_kodu"=>"1",
                  "ip"=>\Illuminate\Support\Facades\Request::ip(),
                  "islem_aciklama"=>json_encode($request->all(), false)
                ]);
        });

        Event::listen(\Illuminate\Auth\Events\Logout::class, function ($event) {
            LogLogin::insert(
                [
                  "user_id"=>"{$event->user->id}",
                  "aciklama"=>"{$event->user->name} Çıkış Yaptı",
                  "islem_kodu"=>"0",
                  "ip"=>\Illuminate\Support\Facades\Request::ip(),
                  "islem_aciklama"=>json_encode($request->all(), false)
                ]);
        });
    }
}
