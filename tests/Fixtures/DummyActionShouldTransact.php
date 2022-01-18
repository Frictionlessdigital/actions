<?php

namespace Tests\Fixtures;

use Fls\Actions\Action;

class DummyActionShouldTransact extends Action
{
    /**
     * @param array $attributes
     * @return array
     */
    public function handle(array $attributes): array
    {
        return $attributes;
    }
}
