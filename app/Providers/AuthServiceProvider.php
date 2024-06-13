<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Policies\PostPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    Category::class => CategoryPolicy::class,
    Comment::class => CommentPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    Gate::before(function (User $user) {
      if ($user->isAdmin) {
        return true;
      }
    });

    Gate::define('admin', function (User $user) {
      return $user->isAdmin;
    });

    Gate::define('update-post', function (User $user, Post $post) {
      return $user->id === $post->author_id
        ? Response::allow()
        : Response::deny('You must be the post\'s author or an adminstrator.');
    });
  }
}
