<?php

namespace Tests\Fixtures;

use Fls\Actions\Action;

class DummyActionValidated extends Action
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function handle(array $attributes): array
    {
        return $this->fill($attributes)->validated();
    }
}
