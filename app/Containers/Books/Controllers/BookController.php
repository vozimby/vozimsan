<?php
declare(strict_types=1);

namespace App\Containers\Books\Controllers;

use App\Containers\Books\Actions\GetAction;
use App\Containers\Books\Actions\PostAction;
use Vozimsan\Core\Application\App;
use Vozimsan\Core\Application\Controllers\AbstractBaseController;
use Vozimsan\Core\Application\Http\Enums\HttpMethodEnums;
use Vozimsan\Core\Application\Router\Attributes\Method;
use Vozimsan\Core\Application\Router\Attributes\Route;

#[Route('/book', name: "book_hello")]
class BookController extends AbstractBaseController
{
    public function actions(): array
    {
        return [
            GetAction::class,
            PostAction::class,
        ];
    }

    #[Method('/hello', [HttpMethodEnums::GET])]
    public function hello()
    {
        echo "HI BROU!";
    }
}