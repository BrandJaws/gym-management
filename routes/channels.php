<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.employee.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
//
//Broadcast::channel('employee.channel.{id}', function ($model, $id) {
//    return $model->id === $id && get_class($model) === 'App\employee';
//});
