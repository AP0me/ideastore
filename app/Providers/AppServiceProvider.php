<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class Gl{
  public static $routes = [
    'homeRoute' => '/',
    'loginRoute' => '/login',
    'signupRoute' => '/signup',
    'ideaRoute' => '/idea'
  ];
  public static $usersRequirements = [
    'passwordMinLen' => 6,
    'unameMaxLen' => 255,
  ];
}  

class AppServiceProvider extends ServiceProvider{
    /**
     * Register any application services.
     */
    public function register(): void{
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void{
        View::composer(['login', 'signup', 'home', 'idea'], function($view){
            $view->with(
                'routes', Gl::$routes,
            );
        });
        View::composer(['login', 'signup'], function($view){
            $view->with(
                'usersReq', Gl::$usersRequirements,
            );
        });
    }
}
