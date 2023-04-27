<?php declare(strict_types=1);

namespace Dive\Enum;

use BackedEnum;

trait Arrayable
{
    public static function toArray(): array
    {
        return array_combine(
            array_map(static fn (BackedEnum $enum) => $enum->name, self::cases()),
            array_map(static fn (BackedEnum $enum) => $enum->value, self::cases()),
        );
    }
}
