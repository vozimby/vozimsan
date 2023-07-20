<?php
declare(strict_types=1);

namespace App\Containers\Books\Requests;

use JetBrains\PhpStorm\ArrayShape;
use Vozimsan\Core\Application\Actions\AbstractBaseAction;
use Vozimsan\Core\Application\Requests\AbstractFormRequest;

class HelloRequest extends AbstractFormRequest
{

    /**
     * @return array[]
     */
    #[ArrayShape(['greeting' => "string[]"])]
    protected function rules(): array
    {
        return [
            'greeting' => ['required']
        ];
    }
}