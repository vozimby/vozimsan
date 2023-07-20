<?php
declare(strict_types=1);

namespace App\Containers\Books\Responses;

use App\Containers\Books\DTO\BookDTO;

class BookResponse
{
    /**
     * @param bool $success
     * @param BookDTO[]|BookDTO|null $books
     */
    public function __construct(
        public bool $success,
        public array|BookDTO|null $books = null
    )
    {
    }
}