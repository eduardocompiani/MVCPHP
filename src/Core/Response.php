<?php

namespace App\Core;

use App\Enum\HTTPStatus;
use App\Interfaces\Model;
use stdClass;

class Response
{
    public string $message;
    public int $code;
    public array|Model $result;
    public int $resultSize;

    public function __construct()
    {
        $this->message = "";
        $this->code = HTTPStatus::OK->value;
        $this->result = [];
        $this->resultSize = 0;
    }

    public function setResult(array|Model $res): void
    {
        $this->result = $res;

        if (is_array($res)) {
            $this->resultSize = count($res);
        } else {
            $this->resultSize = 1;
        }
    }
}