<?php

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use Tests\Fixtures\DummyActionPipe;
use Tests\Fixtures\DummyActionShouldTransact;
use Tests\Fixtures\DummyActionTap;
use Tests\Fixtures\DummyActionValidate;
use Tests\Fixtures\DummyActionValidated;

class ActionTest extends TestCase
{
    #[Test]
    public function it_will_return_validated_data(): void
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionValidated::run($attributes);

        $this->assertEquals($attributes, $result);
    }

    #[Test]
    public function it_will_validate_and_return_instance(): void
    {
        $attributes = ['name' => 'John'];

        $class = DummyActionValidate::make()->fill($attributes);

        $result = $class->run($attributes);

        $this->assertEquals($class, $result);
    }

    #[Test]
    public function it_will_tap_value_and_return_value(): void
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionTap::run($attributes);

        $this->assertEquals($attributes, $result);
    }

    #[Test]
    public function it_will_pipe_value_and_return_closure_result(): void
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionPipe::run($attributes);

        $this->assertEquals($result, [
            'name' => 'Jill',
        ]);
    }

    #[Test]
    public function it_will_run_in_transaction(): void
    {
        $attributes = ['name' => 'John'];

        $resultInTransaction = DummyActionShouldTransact::runInTransaction($attributes);

        $this->assertEquals($attributes, $resultInTransaction);

        $result = DummyActionShouldTransact::run($attributes);

        $this->assertEquals($resultInTransaction, $result);
    }
}
