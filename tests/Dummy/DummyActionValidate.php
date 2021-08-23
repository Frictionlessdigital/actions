<?php

namespace Fls\Actions\Tests\Dummy;

use Fls\Actions\Action;

class DummyActionValidate extends Action
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    /**
     * @param  array $attributes
     * @return $this
     */
    public function handle(array $attributes): self
    {
        return $this->fill($attributes)->validate();
    }
}
