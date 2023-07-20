<?php
declare(strict_types=1);

namespace App\Ship\ServiceProviders;

use App\Ship\Middlewares\GlobalMiddleware;
use Vozimsan\Core\Application\ServiceProviders\AbstractServiceProvider;

class AppServiceProvider extends AbstractServiceProvider
{

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->setMiddlewares([
            GlobalMiddleware::class,
        ]);
    }
}