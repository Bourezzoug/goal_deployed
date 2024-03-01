<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Inscrit;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Policies\AlertPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\InscritPolicy;
use App\Policies\MenuPolicy;
use App\Policies\PagePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\SurveyPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use MattDaneshvar\Survey\Models\Survey;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Category::class     => CategoryPolicy::class,
        Inscrit::class      => InscritPolicy::class,
        Page::class         => PagePolicy::class,
        Permission::class   => PermissionPolicy::class,
        Post::class         => PostPolicy::class,
        Role::class         => RolePolicy::class,
        User::class         => UserPolicy::class,
        Survey::class       =>  SurveyPolicy::class,
        Menu::class         =>  MenuPolicy::class,
        Alert::class        =>  AlertPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('browse_admin', fn(User $user) => $user->hasPermission('browse_admin'));
    }
}
