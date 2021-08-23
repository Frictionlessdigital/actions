<?php

namespace Fls\Actions\Concerns;

use Illuminate\Support\Facades\DB;

trait InteractsWithDatabase
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
        DB::transaction(fn () => $callback($value));

        return $value;
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
        return DB::transaction(fn () => $callback($value));
    }
}
