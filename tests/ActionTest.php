<?php

namespace Fls\Actions\Tests;

use Fls\Actions\Tests\Dummy\DummyActionPipe;
use Fls\Actions\Tests\Dummy\DummyActionShouldTransact;
use Fls\Actions\Tests\Dummy\DummyActionTap;
use Fls\Actions\Tests\Dummy\DummyActionValidate;
use Fls\Actions\Tests\Dummy\DummyActionValidated;

class ActionTest extends TestCase
{
    /** @test */
    public function it_will_return_validated_data()
    {
        DummyActionValidated::mock()
            ->shouldReceive('handle')
            ->with([
                'name' => 'John',
            ])
            ->andReturn(['John']);

        $attributes = ['name' => 'John'];

        $result = DummyActionValidated::run($attributes);

        $this->assertEquals($attributes, $result);
    }

    /** @test */
    public function it_will_validate_and_return_instance()
    {
        DummyActionValidate::mock()
            ->shouldReceive('handle')
            ->with([
                'name' => 'John',
            ])
            ->andReturn(DummyActionValidate::make());

        $attributes = ['name' => 'John'];

        $class = DummyActionValidate::make()->fill($attributes);

        $result = $class->run($attributes);

        $this->assertEquals($class, $result);
    }

    /** @test */
    public function it_will_transact_and_return_value()
    {
        $attributes = ['name' => 'John'];
        $result = DummyActionTap::run($attributes);
        $this->assertEquals($result, $result);
    }

    /** @test */
    public function it_will_transact_and_return_closure_result()
    {
        $attributes = ['name' => 'John'];
        $result = DummyActionPipe::run($attributes);
        $this->assertEquals($result, [
            'name' => 'Jill',
        ]);
    }

    /** @test */
    public function it_will_wrap_handle_in_transaction()
    {
        $attributes = ['name' => 'John'];
        $result = DummyActionShouldTransact::run($attributes);

        $this->assertEquals($result, $result);
    }
}
