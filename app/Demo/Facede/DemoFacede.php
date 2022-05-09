<?php
namespace App\Demo\Facede;

use Illuminate\Support\Facades\Facade;

class DemoFacede extends Facade{
    protected static function getFacadeAccessor()
    { 
        return 'demo';
    }

}