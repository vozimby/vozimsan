<?php
declare(strict_types=1);

namespace App\Containers\Books\Providers;

use App\Containers\Books\DTO\BookDTO;

class BooksProvider
{
    /**
     * @return BookDTO[]
     */
    public function get(): array
    {
        return [
            new BookDTO("Приключение Тома Соера", "Марк Твен"),
            new BookDTO("Приключения Гекльберри Финна", "Марк Твен"),
        ];
    }
}