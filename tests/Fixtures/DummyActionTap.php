<?php

namespace Tests\Fixtures;

use Fls\Actions\Action;

class DummyActionTap extends Action
{
    /**
     * @param array $attributes
     * @return array
     */
    public function handle(array $attributes): array
    {
        return $this->tap($attributes, fn ($attributes) => [
            'name' => 'Jill',
        ]);
    }
}
