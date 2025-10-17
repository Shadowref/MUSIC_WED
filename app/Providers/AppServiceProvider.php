<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // ✅ Cần dòng này
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Chia sẻ biến categories cho tất cả các view
        View::composer('*', function ($view) {
            $view->with('categories', Category::all());
        });
    }

    public function register()
    {
        //
    }
}
