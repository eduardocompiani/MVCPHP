<?php

namespace App\Enum;

enum ControllerDefaultMethods: string {
    case INDEX = "index";
    case GET_BY_ID = "getById";
    case CREATE = "create";
    case UPDATE = "update";
    case DELETE = "delete";
}