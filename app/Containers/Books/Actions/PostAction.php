<?php
declare(strict_types=1);

namespace App\Containers\Books\Actions;

use App\Containers\Books\DTO\BookDTO;
use App\Containers\Books\Middlewares\AuthMiddleware;
use App\Containers\Books\Requests\PostRequest;
use App\Containers\Books\Responses\BookResponse;
use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Actions\AbstractBaseAction;
use Vozimsan\Core\Application\Http\Enums\HttpMethodEnums;
use Vozimsan\Core\Application\Middlewares\Attributes\Middlewares;
use Vozimsan\Core\Application\Requests\Attributes\FormRequest;
use Vozimsan\Core\Application\Router\Attributes\Method;

#[Method('/post', [HttpMethodEnums::POST])]
#[Middlewares([
    AuthMiddleware::class
])]
#[FormRequest(PostRequest::class)]
class PostAction extends AbstractBaseAction
{

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $book = new BookDTO($this->request->get("name"), $this->request->get("author"));
        $response = new BookResponse(true, $book);
        return $this->success($response);
    }
}