<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Compose the navigation bar
     * @return [type] [description]
     */
    private function composeNavigation(){
            view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer');
    }
}