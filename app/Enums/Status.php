<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArray;

enum Status: string
{
    use EnumToArray;

    case COMPLETED = 'completed';
    case PROCESSING = 'processing';
}
