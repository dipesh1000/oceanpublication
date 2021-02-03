<?php

namespace App\Providers;

use App\Repositories\AdminForm\FormInterface;
use App\Repositories\AdminForm\FormRepository;
use App\Repositories\Album\AlbumInterface;
use App\Repositories\Album\AlbumRepository;
use App\Repositories\BookRepo\BookInterface;
use App\Repositories\FrontCms\CmsInterface;
use App\Repositories\FrontCms\CmsRepository;
use App\Repositories\RepoCourse\CourseInterface;
use App\Repositories\RepoCourse\CourseRepository;
use App\Repositories\VideoRepo\VideoInterface;
use Illuminate\Support\ServiceProvider;
use VideoRepository;

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
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
        $this->app->bind(VideoInterface::class, VideoRepository::class);
        $this->app->bind(PackageInterface::class, PackageRepository::class);
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
