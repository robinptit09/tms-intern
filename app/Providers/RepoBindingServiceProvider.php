<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoBindingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'Post',
            'Course',
            'Exam',
            'Question',
            'Option',
            'Answer'
        );

        foreach ($models as $model) {
            $this->app->bind("App\\Interfaces\\{$model}RepositoryInterface", "App\\Repositories\\Eloquent\\{$model}Repository");
        }
        
    }
}
