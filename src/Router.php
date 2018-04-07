<?php

namespace Awonwon\Leadr;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Routing\Router as BaseRouter;

class Router extends BaseRouter
{
    /**
     * Create a new Route object.
     *
     * @param  array|string  $methods
     * @param  string  $uri
     * @param  mixed  $action
     * @return \Illuminate\Routing\Route
     */
    protected function newRoute($methods, $uri, $action)
    {
        $path = parse_url(config('app.url'), PHP_URL_PATH);
        $rootPrefix = preg_replace('/^(\/)|(\/)$/', '', $path);

        if ($uri == '/') {
            $uri = $rootPrefix;
        } else {
            $uri = $rootPrefix.'/'.$uri;
        }
        return parent::newRoute($methods, $uri, $action);
    } 
}
