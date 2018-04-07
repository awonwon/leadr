<?php

namespace Awonwon\Leadr;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Routing\RouteUrlGenerator as BaseGenerator;

class RouteUrlGenerator extends BaseGenerator
{
    /**
     * Generate a URL for the given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @param  array  $parameters
     * @param  bool  $absolute
     * @return string
     *
     * @throws \Illuminate\Routing\Exceptions\UrlGenerationException
     */
    public function to($route, $parameters = [], $absolute = false)
    {
        $path = parse_url(config('app.url'), PHP_URL_PATH);
        $rootPrefix = preg_replace('/^(\/)|(\/)$/', '', $path);
        $rootPrefix = str_replace('/', '\/', $rootPrefix);
        $route->uri = preg_replace('/' . $rootPrefix . '\//i', '', $route->uri());
        return parent::to($route, $parameters, $absolute);
    } 
}
