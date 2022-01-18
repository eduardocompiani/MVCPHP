<?php

namespace App\Core;

use App\Exception\MethodNotImplemented;
use App\Interfaces\ControllerInterface;
use App\Interfaces\DTO;
use App\Interfaces\Model;
use App\Interfaces\View;

class AbstractController implements ControllerInterface
{
    /**
     * @inheritDoc
     * @throws MethodNotImplemented
     */
    public function index(): array|View
    {
        throw  new MethodNotImplemented();
    }

    /**
     * @inheritDoc
     * @throws MethodNotImplemented
     */
    public function getById(): Model|View
    {
        throw  new MethodNotImplemented();
    }

    /**
     * @inheritDoc
     * @throws MethodNotImplemented
     */
    public function create(): Model
    {
        throw  new MethodNotImplemented();
    }

    /**
     * @inheritDoc
     * @throws MethodNotImplemented
     */
    public function update(): Model
    {
        throw  new MethodNotImplemented();
    }

    /**
     * @inheritDoc
     * @throws MethodNotImplemented
     */
    public function delete(): bool
    {
        throw  new MethodNotImplemented();
    }

}