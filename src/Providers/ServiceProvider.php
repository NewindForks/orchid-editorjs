<?php

namespace AlexSabur\OrchidEditorJSField\Providers;

use Illuminate\Support\Facades\View;
use Orchid\Platform\Dashboard;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const PACKAGE_PATH = __DIR__ . '/../../';

    /**
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * Perform post-registration booting of services.
     *
     * @param  Dashboard  $dashboard
     * @return void
     * @throws \Exception
     */
    public function boot(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;

        $this->loadViewsFrom(static::PACKAGE_PATH . '/resources/views', 'platform');

        $this->registerResources()
            ->registerProviders();
    }

    /**
     * Register provider.
     */
    public function registerProviders(): self
    {
        foreach ($this->provides() as $provide) {
            $this->app->register($provide);
        }

        return $this;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            RouteServiceProvider::class,
        ];
    }

    /**
     * Registering resources.
     *
     * @throws \Exception
     */
    private function registerResources(): self
    {
        $this->dashboard->addPublicDirectory('editorjs', static::PACKAGE_PATH . '/public/');

        View::composer('platform::app', function () {
            $this->dashboard
                ->registerResource('scripts', orchid_mix('/js/editorjs.js', 'editorjs'));
        });

        return $this;
    }
}
