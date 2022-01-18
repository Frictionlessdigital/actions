<?php

namespace Tests;

use Tests\Fixtures\DummyActionPipe;
use Tests\Fixtures\DummyActionShouldTransact;
use Tests\Fixtures\DummyActionTap;
use Tests\Fixtures\DummyActionValidate;
use Tests\Fixtures\DummyActionValidated;

class ActionTest extends TestCase
{
    /** @test */
    public function it_will_return_validated_data()
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionValidated::run($attributes);

        $this->assertEquals($attributes, $result);
    }

    /** @test */
    public function it_will_validate_and_return_instance()
    {
        $attributes = ['name' => 'John'];

        $class = DummyActionValidate::make()->fill($attributes);

        $result = $class->run($attributes);

        $this->assertEquals($class, $result);
    }

    /** @test */
    public function it_will_tap_value_and_return_value()
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionTap::run($attributes);

        $this->assertEquals($attributes, $result);
    }

    /** @test */
    public function it_will_pipe_value_and_return_closure_result()
    {
        $attributes = ['name' => 'John'];

        $result = DummyActionPipe::run($attributes);

        $this->assertEquals($result, [
            'name' => 'Jill',
        ]);
    }

    /** @test */
    public function it_will_run_in_transaction()
    {
        $attributes = ['name' => 'John'];

        $resultInTransaction = DummyActionShouldTransact::runInTransaction($attributes);

        $this->assertEquals($attributes, $resultInTransaction);

        $result = DummyActionShouldTransact::run($attributes);

        $this->assertEquals($resultInTransaction, $result);
    }
}
