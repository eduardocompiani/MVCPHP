<?php

namespace App\Interfaces;

use App\Core\Request;

interface HandleRequest
{
    public function setRequest(Request $request): void;
}