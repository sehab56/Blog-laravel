<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ViewServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

//        View::share('name','sehab');  //all view page data pathano system.
        /*View::composer('admin.category.add-category', function ($view){
            $view->name = 'sehab';
        });*/  //specific view page data pathano system.

        /*View::composer(['font-end.*','admin.*'], function ($view){  //doble view data pathanor jonno array moddho comma die view file name likhe dite hoi
            $view->categories = Category::where('publication_status',1)->get();

        });*/
        View::composer('font-end.*', function ($view){  //doble view data pathanor jonno array moddho comma die view file name likhe dite hoi
            $view->categories = Category::where('publication_status',1)->get();
//            $view->with('categories', Category::where('publication_status',1)->get());

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
