<?php

declare(strict_types=1);

namespace Growthdev\DataStructure\Tests\Stack;

use Growthdev\DataStructure\Stack\Stack;
use Growthdev\DataStructure\Stack\ValueObject;
use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    public function testCanBePeek(): void
    {
        $stack = new Stack();
        $stack->push(new ValueObject('Fist Item'));
        $stack->push(new ValueObject('Second Item'));
        $stack->push(new ValueObject('Last Item (top item)'));

        $this->assertEquals('Last Item (top item)', $stack->peek()->getValue());
    }

    public function testCanBePush(): void
    {
        $stack = new Stack();
        $stack->push(new ValueObject('Walmir'));
        $stack->push(new ValueObject('Silva'));
        $stack->push(new ValueObject('Growth'));
        $stack->push(new ValueObject('Dev'));
        $stack->push(new ValueObject('Example'));
        $stack->push(new ValueObject('Stack'));

        $this->assertEquals(6, $stack->count());
    }

    public function testCanBePop(): void
    {
        $stack = new Stack();
        $stack->push(new ValueObject('Fist Item'));
        $stack->push(new ValueObject('Second Item'));
        $stack->push(new ValueObject('Last Item (top item)'));

        $this->assertEquals('Last Item (top item)', $stack->pop()->getValue());
        $this->assertEquals(2, $stack->count());
    }

    public function testIfIsEmpty(): void
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
    }

    public function testCanBeIterated(): void
    {
        $stack = new Stack();
        $stack->push(new ValueObject('Fist Item'));
        $stack->push(new ValueObject('Second Item'));
        $stack->push(new ValueObject('Third Item'));
        $stack->push(new ValueObject('Last Item (top item)'));
    
        $this->assertEquals(4, $stack->count());
        $this->assertEquals('Last Item (top item)', $stack->pop()->getValue());
        $this->assertEquals('Third Item', $stack->pop()->getValue());
        $this->assertEquals('Second Item', $stack->pop()->getValue());
        $this->assertEquals('Fist Item', $stack->pop()->getValue());
        $this->assertEquals(0, $stack->count());
    }

    public function testCanBeIteratedWithLoop(): void
    {
        $stack = new Stack();
        $stack->push(new ValueObject('1º Item'));
        $stack->push(new ValueObject('2º Item'));
        $stack->push(new ValueObject('3º Item'));
        $stack->push(new ValueObject('4º Item (top item)'));

        $stack->rewind();

        while ($stack->hasNext()) {
            $currentValue = $stack->current()->getValue();
            printf("\t%s\n", $currentValue);
            
            $this->assertNotEmpty($currentValue);
            $stack->next();
        }

        $stack->rewind();
        while ($stack->hasNext()) {
            $currentValue = $stack->current()->getValue();
            printf("\t%s\n", $currentValue);
            
            $this->assertNotEmpty($currentValue);
            $stack->next();
        }
    }
}
