<?php

namespace Linlak\LinSocial\Facades;

use Illuminate\Support\Facades\Facade;

class LinSocial extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'linsocial';
    }
    /**
     * Resolve the facade root instance from the container.
     *
     * @param  string  $name
     * @return mixed
     */
    protected static function resolveFacadeInstance($name)
    {
        if (!isset(static::$resolvedInstance[$name]) && !isset(static::$app, static::$app[$name])) {
            $class = static::DEFAULT_FACADE;

            static::swap(new $class);
        }

        return parent::resolveFacadeInstance($name);
    }
}
