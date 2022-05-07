<?php declare(strict_types=1);

namespace Dive\Enum;

use UnitEnum;

trait NameListable
{
    public static function toNames(): array
    {
        return array_map(static fn (UnitEnum $enum) => $enum->name, self::cases());
    }
}
