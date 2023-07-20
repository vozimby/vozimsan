<?php
declare(strict_types=1);

namespace App\Containers\Users\Controllers;

use Vozimsan\Core\Application\Controllers\AbstractBaseController;
use Vozimsan\Core\Application\Router\Attributes\Route;

#[Route('/user/')]
class UserController extends AbstractBaseController
{
    public function __invoke()
    {
        echo "HI";
    }
}