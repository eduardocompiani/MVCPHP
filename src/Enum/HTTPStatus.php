<?php

namespace App\Enum;

enum HTTPStatus: int {
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
}