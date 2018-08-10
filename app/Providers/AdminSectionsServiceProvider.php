<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\SectionsAdmin\Users',
        \App\Manufacture::class => 'App\Http\SectionsAdmin\Manufacturies',
        \App\Category::class => 'App\Http\SectionsAdmin\Categories',
        \App\Country::class => 'App\Http\SectionsAdmin\Countries',
        \App\Product::class => 'App\Http\SectionsAdmin\Products',
        \App\Wine::class => 'App\Http\SectionsAdmin\Wines',
        \App\Order::class => 'App\Http\SectionsAdmin\Orders',
        \App\WinesColor::class => 'App\Http\SectionsAdmin\WinesColor',
        \App\WinesType::class => 'App\Http\SectionsAdmin\WinesType',

    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
