<?php

namespace App\Providers;
use App\BlogCategory;
use App\Tag;
use File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.partials.sidebar', function($view)
        {
            $categories = BlogCategory::all();
            $tags = Tag::all();
            $view->with(['tags' => $tags, 'categories' => $categories]);
        });
        $menus = [];
        if (File::exists(base_path('resources/laravel-admin/menus.json'))) {
            $menus = json_decode(File::get(base_path('resources/laravel-admin/menus.json')));
            // dd($menus);
            view()->share('laravelAdminMenus', $menus);
        }

    }


    public function register()
    {
        //
    }
}
