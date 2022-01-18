<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Interfaces\ControllerInterface;
use App\Interfaces\View;

class Foo extends AbstractController implements ControllerInterface
{
    /**
     * @inheritDoc
     */
    public function index(): array|View
    {
        return [
            (object) ["name" => "Eduardo", "age" => 22],
            (object) ["name" => "Fulano", "age" => 11],
            (object) ["name" => "Ciclano", "age" => 67],
        ];
    }

}