<?php

namespace App\Providers;

use App\Repositories\AdminForm\FormInterface;
use App\Repositories\AdminForm\FormRepository;
use App\Repositories\Album\AlbumInterface;
use App\Repositories\Album\AlbumRepository;
use App\Repositories\FrontCms\CmsInterface;
use App\Repositories\FrontCms\CmsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CmsInterface::class, CmsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
