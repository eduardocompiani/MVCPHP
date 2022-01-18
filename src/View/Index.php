<?php

namespace App\View;

use App\Core\Request;
use App\Interfaces\View;
use App\Traits\DependencyInjectionTrait;

class Index implements View
{
    use DependencyInjectionTrait;

    public function getTemplateName(): string
    {
        return 'index';
    }

    public function getData(): object
    {
        /** @var Request $request */
        $request = $this->getDI()->get(Request::class);

        return (object) $request->getUrlParams();
    }
}