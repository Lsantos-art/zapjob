<?php

namespace App\Providers;

use App\models\AdminNotifications;
use App\models\Categories;
use App\models\MasterNotifications;
use App\models\Notifications;
use App\models\Posts;
use App\models\Star;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master.*', function($view){
            $categories = Categories::orderBy('name', 'asc')->get();
            $notifications = MasterNotifications::get()->first();
            $usersposts = Posts::paginate();
            $usersregister = User::paginate();
            $actives = User::latest()->paginate(20);
            $view->with([
                'notifications' => $notifications,
                'usersposts' => $usersposts,
                'usersregister' => $usersregister,
                'actives' => $actives,
                'categories' => $categories
            ]);
        });

        view()->composer('admin.*', function($view){
            $notifications = auth()->user()->notifications;
            $categories = Categories::orderBy('name', 'asc')->get();
            $view->with([
                'categories' => $categories,
                'notifications' => $notifications,
            ]);
        });

        view()->composer('site.*', function($view){
            $stars = Star::get()->first();
            $categories = Categories::orderBy('name', 'asc')->get();

            if (auth()->user()) {
                $notifications = auth()->user()->notifications;
            }else{
                $notifications['qtd'] = 0;
                $notifications['message'] = 'none';
            }

            $view->with([
                'notifications' => $notifications,
                'stars' => $stars,
                'categories' => $categories
            ]);
        });
    }
}
