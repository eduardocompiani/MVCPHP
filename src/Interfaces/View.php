<?php

namespace App\Interfaces;

interface View
{
    public function getTemplateName(): string;
    public function getData(): object;
}