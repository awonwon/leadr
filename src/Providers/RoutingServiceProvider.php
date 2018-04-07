<?php
namespace Leadr\Providers;

use Awonwon\Leadr\Router;
use Awonwon\Leadr\UrlGenerator;
use Awonwon\Leadr\RouteUrlGenerator;
use Illuminate\Routing\RoutingServiceProvider as ServiceProvider;

class RoutingServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function register(){
        parent::register();

        $routes = $this->app['router']->getRoutes();
        $urlGenerator = new UrlGenerator($routes, $this->app->make('request'));
        $this->app->instance('url', $urlGenerator);
    }


    /**
     * Register the router instance.
     */
    protected function registerRouter()
    {
        $this->app->singleton('router', function($app) {
            return new Router($app['events'], $app);
        });

    }

}