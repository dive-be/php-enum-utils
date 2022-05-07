<?php declare(strict_types=1);

namespace Dive\Enum;

use BackedEnum;

trait ValueListable
{
    public static function toValues(): array
    {
        return array_map(static fn (BackedEnum $enum) => $enum->value, self::cases());
    }
}
