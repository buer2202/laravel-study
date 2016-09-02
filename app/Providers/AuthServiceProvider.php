<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Auth;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate, Request $request)
    {
        // $this->registerPolicies($gate);

        // $gate->before(function ($user, $ability) {
        //     dump('before');
        //     return true;
        // });

        // $gate->define('update-post', function ($user, $post) {
        //     dump($user->id, $post);
        //     return $user->id === $post->user_id;
        // });

        // $gate->after(function ($user, $ability, $result, $arguments) {
        //     dump('after');
        //     return true;
        // });

    }
}
