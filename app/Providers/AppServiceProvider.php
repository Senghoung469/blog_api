<?php
namespace App\Providers;
use App\Api\Auth\AuthRepository;
use App\Api\Auth\AuthRepositoryImp;
use App\Api\Auth\AuthService;
use App\Api\Auth\AuthServiceImp;
use App\Api\Category\CategoryRepository;
use App\Api\Category\CategoryRepositoryImp;
use App\Api\Category\CategoryService;
use App\Api\Category\CategoryServiceImp;
use App\Api\Tag\TagRepository;
use App\Api\Tag\TagRepositoryImp;
use App\Api\Tag\TagService;
use App\Api\Tag\TagServiceImp;
use App\Api\User\UserRepository;
use App\Api\User\UserRepositoryImp;
use App\Api\User\UserService;
use App\Api\User\UserServiceImp;
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
        $this->app->bind(UserRepository::class, UserRepositoryImp::class);
        $this->app->bind(UserService::class, UserServiceImp::class);
        $this->app->bind(AuthRepository::class, AuthRepositoryImp::class);
        $this->app->bind(AuthService::class, AuthServiceImp::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImp::class);
        $this->app->bind(CategoryService::class, CategoryServiceImp::class);
        $this->app->bind(TagRepository::class, TagRepositoryImp::class);
        $this->app->bind(TagService::class, TagServiceImp::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
