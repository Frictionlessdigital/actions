<?php

namespace Fls\Actions\Concerns;

trait InteractsWithValues
{
    /**
     * Tap the argument with a callback.
     *
     * @param mixed $value
     * @param callable $callback
     * @return mixed
     */
    protected function tap($value, callable $callback)
    {
        return tap($value, fn () => $callback($value));
    }

    /**
     * Pipe the argument through a callback.
     *
     * @param mixed $value
     * @param callable $callback
     * @return mixed
     */
    protected function pipe($value, callable $callback)
    {
        return $callback($value);
    }
}
