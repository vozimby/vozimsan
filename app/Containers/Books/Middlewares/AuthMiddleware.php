<?php
declare(strict_types=1);

namespace App\Containers\Books\Middlewares;

use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Http\Constants\StatusCode;
use Vozimsan\Core\Application\Middlewares\AbstractMiddleware;
use Vozimsan\Core\Rest\Http\Request;

class AuthMiddleware extends AbstractMiddleware
{

    /**
     * @param Request $request
     * @return Response|false
     */
    public function process(Request $request): Response|false
    {
        if ($request->headers->get("Authorization") !== "123") {
            return $this->error("You a not authorized", StatusCode::UNAUTHORIZED);
        }
        return false;
    }
}