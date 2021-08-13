<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Adviser;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isStudent', function($user) {
            return $user->type == 'student';
        });

        Gate::define('isAdviser', function ($user) {
            return $user->type == 'adviser';
        });

        Gate::define('dashboard-index', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('dashboard-post', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('dashboard-formation', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('listingAlternant.delete', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('dashboard-formation-suivi', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('listingPosts.delete', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('update', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('post', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que conseiller.');
        });

        Gate::define('create.student', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que alternant.');
        });

        Gate::define('listingsPosts', function (User $user) {
            return $user->type == 'adviser'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que alternant.');
        });

        Gate::define('followup', function (User $user) {
            return $user->type == 'student'
                        ? Response::allow()
                        : Response::deny('Accès refusé. Connectez vous en tant que alternant.');
        });
    }
};
