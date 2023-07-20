<?php
declare(strict_types=1);

namespace App\Containers\Books\Actions;

use App\Containers\Books\DTO\BookDTO;
use App\Containers\Books\Responses\BookResponse;
use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Actions\AbstractBaseAction;
use Vozimsan\Core\Application\Http\Enums\HttpMethodEnums;
use Vozimsan\Core\Application\Router\Attributes\Method;

#[Method('/post', [HttpMethodEnums::POST])]
class PostAction extends AbstractBaseAction
{

    public function __invoke(): Response
    {
        $book = new BookDTO($this->request->get("name"), $this->request->get("author"));
        $response = new BookResponse(true, $book);
        return $this->success($response);
    }
}