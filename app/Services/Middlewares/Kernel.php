<?php

namespace App\Services\Middlewares;

/**
 * Class Kernel
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Kernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * @return  array
     */
    public function applicationMiddlewares()
    {
        return [
            // Laravel default middleware's
            \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
            \App\Services\Middlewares\Http\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,

            // removing some of the Laravel's default middleware's
            //            \Illuminate\Session\Middleware\StartSession::class,
            //            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            //            \App\Services\Middlewares\Http\VerifyCsrfToken::class,

            // CORS Package middleware
            \Barryvdh\Cors\HandleCors::class,
            // Hello API Localization middleware
            \App\Services\Middlewares\Http\Localization::class,
        ];
    }

    /**
     * The application's route middleware.
     *
     * @return  array
     */
    public function routeMiddlewares()
    {
        return [
            // removing the Laravel's default route middleware's
            //            'auth' => \App\Services\Middlewares\Http\Authenticate::class,
            //            'auth.basic' => \App\Services\Middlewares\Http\AuthenticateWithBasicAuth::class,
            //            'guest' => \App\Services\Middlewares\Http\RedirectIfAuthenticated::class,


            // JWT Package middleware's
            'jwt.auth'    => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
            'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,

            // Entrust Package middleware's
            'role'        => \Zizaco\Entrust\Middleware\EntrustRole::class,
            'permission'  => \Zizaco\Entrust\Middleware\EntrustPermission::class,
            'ability'     => \Zizaco\Entrust\Middleware\EntrustAbility::class,

            // ...
        ];

    }

}
