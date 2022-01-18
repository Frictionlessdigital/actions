<?php

namespace Fls\Actions\Concerns;

use Illuminate\Support\Facades\DB;

trait AsObjectInTransaction
{
    /**
     * @param mixed $arguments,.. Action aguments
     * @return mixed
     * @throws \Throwable
     */
    public static function runInTransaction(...$arguments)
    {
        return DB::transaction(fn () => self::run(...$arguments));
    }
}
