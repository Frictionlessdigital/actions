<?php

namespace Fls\Actions\Tests\Dummy;

use Fls\Actions\Action;
use Fls\Actions\Contracts\ShouldTransact;

class DummyActionShouldTransact extends Action implements ShouldTransact
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
