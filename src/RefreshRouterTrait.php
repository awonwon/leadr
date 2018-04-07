<?php

namespace Leadr;

trait RefreshRouterTrait
{

    protected function dispatchToRouter()
    {
        $this->router = $this->app['router'];

        $this->router->middlewarePriority = $this->middlewarePriority;

        foreach ($this->middlewareGroups as $key => $middleware) {
            $this->router->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->router->aliasMiddleware($key, $middleware);
        }

        return parent::dispatchToRouter();
    }
}