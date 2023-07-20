<?php
declare(strict_types=1);

namespace App\Containers\Books\Controllers;

use App\Containers\Books\Actions\GetAction;
use App\Containers\Books\Actions\PostAction;
use App\Containers\Books\Middlewares\AuthMiddleware;
use App\Containers\Books\Requests\HelloRequest;
use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Controllers\AbstractBaseController;
use Vozimsan\Core\Application\Http\Enums\HttpMethodEnums;
use Vozimsan\Core\Application\Middlewares\Attributes\Middlewares;
use Vozimsan\Core\Application\Requests\Attributes\FormRequest;
use Vozimsan\Core\Application\Router\Attributes\Method;
use Vozimsan\Core\Application\Router\Attributes\Route;

#[Route('/book')]
class BookController extends AbstractBaseController
{
    /**
     * @return string[]
     */
    public function actions(): array
    {
        return [
            GetAction::class,
            PostAction::class,
        ];
    }

    #[Method('/hello', [HttpMethodEnums::GET])]
    #[Middlewares([AuthMiddleware::class])]
    #[FormRequest(HelloRequest::class)]
    public function hello(): Response
    {
        return $this->success(["greeting" => "{$this->request->greeting}, world!"]);
    }
}