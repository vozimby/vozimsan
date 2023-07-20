<?php
declare(strict_types=1);

namespace App\Ship\Middlewares;

use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Http\Constants\StatusCode;
use Vozimsan\Core\Application\Middlewares\AbstractMiddleware;
use Vozimsan\Core\Rest\Http\Request;

class GlobalMiddleware extends AbstractMiddleware
{

    /**
     * @param Request $request
     * @return Response|false
     */
    public function process(Request $request): Response|false
    {
        if ($request->headers->get("App-Version") !== envGet("APP_VERSION")) {
            return $this->error("You use old version of API!", StatusCode::NOT_ALLOWED);
        }
        return false;
    }
}