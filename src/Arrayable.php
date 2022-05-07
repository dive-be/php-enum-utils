<?php declare(strict_types=1);

namespace Dive\Enum;

use BackedEnum;
use ReflectionEnum;

trait Arrayable
{
    public static function toArray(): array
    {
        return array_map(static fn (BackedEnum $enum) => $enum->value,
            (new ReflectionEnum(self::class))->getConstants()
        );
    }
}
