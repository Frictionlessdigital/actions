<?php

namespace Fls\Actions\Tests\Dummy;

use Fls\Actions\Action;

class DummyActionTap extends Action
{
    /**
     * @param  array $attributes
     * @return array
     */
    public function handle(array $attributes): array
    {
        return $this->tap($attributes, fn ($attributes) => [
            'name' => 'Jill',
        ]);
    }
}
