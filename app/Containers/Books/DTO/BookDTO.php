<?php
declare(strict_types=1);

namespace App\Containers\Books\DTO;

class BookDTO
{
    /**
     * @param string $name
     * @param string $author
     */
    public function __construct(
        public string $name,
        public string $author
    )
    {
    }
}