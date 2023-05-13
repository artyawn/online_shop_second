<?php

namespace App\Enums;

enum Status : string
{
    case First = 'принят';
    case Second = 'отправлен';
    case Third = 'доставлен';
}
