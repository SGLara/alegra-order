<?php

namespace App\Enums\Traits;

trait EnumToArray
{
    /**
     * Get names of enum
     */
    public static function names(): array
    {
        return array_column((self::cases()), 'name');
    }

    /**
     * Get values of enum
     */
    public static function values(): array
    {
        return array_column((self::cases()), 'value');
    }

    /**
     * Get key value pairs of enum
     */
    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }
}
