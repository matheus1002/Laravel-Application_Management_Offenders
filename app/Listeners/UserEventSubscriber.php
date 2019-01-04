<?php

namespace App\Listeners;

use Illuminate\Database\Eloquent\Model;

class UserEventSubscriber extends Model
{
    public function onUserLogin($event)
    {
        auth()->user()->registrarAcessoOn();
    }

    public function onUserLogout($event)
    {
        auth()->user()->registrarAcessoOff();
    }

    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
