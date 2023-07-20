<?php
declare(strict_types=1);

namespace App\Containers\Books\Requests;

use Vozimsan\Core\Application\Requests\AbstractFormRequest;

class PostRequest extends AbstractFormRequest
{

    /**
     * @var bool
     */
    protected bool $useData = true;

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => ['required'],
            'author' => ['required'],
        ];
    }
}