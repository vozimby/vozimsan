<?php
declare(strict_types=1);

namespace App\Containers\Books\Actions;

use App\Containers\Books\DTO\BookDTO;
use App\Containers\Books\Providers\BooksProvider;
use App\Containers\Books\Responses\BookResponse;
use Symfony\Component\HttpFoundation\Response;
use Vozimsan\Core\Application\Actions\AbstractBaseAction;
use Vozimsan\Core\Application\Http\Constants\StatusCode;
use Vozimsan\Core\Application\Http\Enums\HttpMethodEnums;
use Vozimsan\Core\Application\Router\Attributes\Method;

#[Method('/get', [HttpMethodEnums::GET])]
class GetAction extends AbstractBaseAction
{

    /**
     * @param BooksProvider $booksProvider
     */
    public function __construct(
        protected BooksProvider $booksProvider,
    )
    {
        parent::__construct();
    }

    public function __invoke(): Response
    {
        $books = $this->booksProvider->get();

        $response = new BookResponse(true, $books);

        return $this->success($response);
    }
}