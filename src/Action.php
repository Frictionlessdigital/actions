<?php

namespace Fls\Actions;

use Fls\Actions\Concerns\AsObjectInTransaction;
use Fls\Actions\Concerns\InteractsWithValues;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

abstract class Action
{
    use AsAction;
    use AsObjectInTransaction;
    use InteractsWithValues;
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
}
