<?php declare(strict_types=1);

namespace Dive\Enum;

use BadMethodCallException;
use ReflectionEnum;

trait Assertable
{
    public function __call(string $name, array $arguments): bool
    {
        if (! str_starts_with($name, 'is') || count($arguments)) {
            throw new BadMethodCallException(sprintf('Call to undefined method %s::%s(...)', $this::class, $name));
        }

        $key = substr($name, 2);
        $reflect = new ReflectionEnum($this);

        if (! $reflect->hasConstant($key)) {
            throw new BadMethodCallException(sprintf('Call to undefined method %s::%s()', $this::class, $name));
        }

        return $this === $reflect->getConstant($key);
    }
}
