<?php

namespace roblesterjr04\disky;

use Illuminate\Support\ServiceProvider;
use Storage;
use Illuminate\Filesystem\Filesystem;

class DiskyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (config('filesystems.disks') as $key=>$config) {
	        if ($key != 'public')
		        Storage::disk($key)->addPlugin(new DiskyPlugin_Copy);
        }
        
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}