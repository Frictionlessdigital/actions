<?php

namespace Fls\Actions\Tests\Dummy;

use Fls\Actions\Action;

class DummyActionPipe extends Action
{
    /**
     * @param  array $attributes
     * @return array
     */
    public function handle(array $attributes): array
    {
        return $this->pipe($attributes, fn ($attributes) => [
            'name' => 'Jill',
        ]);
    }
}
