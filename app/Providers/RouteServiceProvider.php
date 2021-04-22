<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapUserRoutes();

        $this->mapWebRoutes();

        $this->mapFlightRoutes();

        $this->mapSuperAdminRoutes();

        $this->mapHomeRoutes();

        $this->mapHotelRoutes();

        $this->payumoneyRoutes();
 
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "super admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

    protected function mapFlightRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/flight.php'));
    }
    
    /**
     * Define the "super admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

    protected function mapSuperAdminRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/super_admin.php'));
    }

      /**
     * Define the "Home" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

    protected function mapHomeRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/home.php'));
    }

     /**
     * Define the "Home" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */

    protected function mapHotelRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/hotel.php'));
    }
    /**
     * Define the "user" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapUserRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/user.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

     /**
     * Define the "payumoney" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function payumoneyRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/payu_money.php'));
    }
    
    

}
