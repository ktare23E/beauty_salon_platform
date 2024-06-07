<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other Kernel contents...

    protected $routeMiddleware = [
        // Other middleware entries...
        'redirectIfAuthenticatedToDashboard' => \App\Http\Middleware\RedirectIfAuthenticatedToDashboard::class,
    ];
}


?>