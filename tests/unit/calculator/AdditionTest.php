<?php

    use PHPUnit\Framework\TestCase;

    class AdditionTest extends TestCase {
        
        /** @test */
        public function adds_up_given_operands()
        {
            $addition = new \App\Calculator\Addition;
            $addition->setOperands([5, 10]);

            $this->assertEquals(15, $addition->calculate());
        }

        /** @test */
        public function noOperandsGivenThrowsExceptionWhenCalculating(): void
        {
            $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);
            $addition = new \App\Calculator\Addition;
            $addition->calculate();
        }
    }
