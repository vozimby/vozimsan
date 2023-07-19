<?php
declare(strict_types=1);

namespace App\Containers\Books\Controllers;

use Symfony\Component\Routing\Annotation\Route;
use Vozimsan\Core\Application\App;
use Vozimsan\Core\Application\Controllers\AbstractBaseController;

class BookController extends AbstractBaseController
{
    #[Route('/book/hello', name: "hello")]
    public function hello()
    {
        var_dump(App::$basePath);
        echo "HI BROU!";
    }
}