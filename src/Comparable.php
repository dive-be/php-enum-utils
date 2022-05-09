<?php declare(strict_types=1);

namespace Dive\Enum;

trait Comparable
{
    public function equals(self|int|string $other): bool
    {
        if (! $other instanceof self) {
            $other = self::from($other);
        }

        return $this === $other;
    }

    public function equalsAny(array $others): bool
    {
        foreach ($others as $other) {
            if ($this->equals($other)) {
                return true;
            }
        }

        return false;
    }
}
