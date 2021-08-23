<?php

namespace Fls\Actions;

use Fls\Actions\Concerns\InteractsWithDatabase;
use Fls\Actions\Contracts\ShouldTransact;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

abstract class Action
{
    use AsAction;
    use InteractsWithDatabase;
    use WithAttributes;

    /**
     * @return $this
     */
    public function validate(): self
    {
        return tap($this, fn ($self) => $self->validateAttributes());
    }

    /**
     * Defer to validator to return validated attributes.
     *
     * @return array
     */
    public function validated(): array
    {
        return $this->validateAttributes();
    }

    /**
     * @return bool
     */
    public function shouldTransact(): bool
    {
        return $this instanceof ShouldTransact;
    }

    /**
     * @see static::handle()
     * @param mixed ...$arguments
     * @return mixed
     */
    public static function run(...$arguments)
    {
        $action = static::make();

        if ($action->shouldTransact()) {
            return DB::transaction(fn () => $action->handle(...$arguments));
        }

        return $action->handle(...$arguments);
    }
}
