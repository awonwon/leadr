<?php

namespace Leadr;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;
use Awonwon\Leadr\RouteUrlGenerator;

class UrlGenerator extends BaseUrlGenerator
{
    /**
     * Get the base URL for the request.
     *
     * @param  string  $scheme
     * @param  string  $root
     * @return string
     */
    public function formatRoot($scheme, $root = null)
    {
        $path = parse_url(config('app.url'), PHP_URL_PATH);
        $rootPrefix = preg_replace('/^(\/)|(\/)$/', '', $path);
        return parent::formatRoot($scheme, $root).'/'.$rootPrefix;
    }


    /**
     * Get the Route URL generator instance.
     *
     * @return \Illuminate\Routing\RouteUrlGenerator
     */
    protected function routeUrl()
    {
        if (! $this->routeGenerator) {
            $this->routeGenerator = new RouteUrlGenerator($this, $this->request);
        }

        return $this->routeGenerator;
    }

}
