<?php


namespace App\Custom\Facades;


use Illuminate\Support\Facades\Facade;

class MessagesService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'message';
    }
}
