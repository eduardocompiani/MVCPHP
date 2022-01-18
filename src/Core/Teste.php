<?php

namespace App\Core;

use App\Interfaces\ControllerInterface;
use App\Interfaces\DTO;
use App\Interfaces\Model;

class Teste implements ControllerInterface
{
    public function index(): array
    {
        // TODO: Implement index() method.
    }

    public function getById(int $id): Model
    {
        // TODO: Implement getById() method.
    }

    public function update(DTO $DTO): Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}