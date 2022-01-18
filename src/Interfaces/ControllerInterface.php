<?php

namespace App\Interfaces;

use App\Core\Request;
use App\Exception\MethodNotImplemented;

interface ControllerInterface
{
    /**
     * @return array|View
     */
    public function index(): array|View;

    /**
     * @return Model|View
     */
    public function getById(): Model|View;

    /**
     * @return Model
     */
    public function create(): Model;

    /**
     * @return Model
     */
    public function update(): Model;

    /**
     * @return bool
     */
    public function delete(): bool;
}