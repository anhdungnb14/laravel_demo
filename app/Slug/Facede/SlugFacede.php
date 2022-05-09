<?php
namespace App\Slug\Facede;

use Illuminate\Support\Facades\Facade;

class SlugFacede extends Facade{
    protected static function getFacadeAccessor()
    {
        return "slug";
    }
}