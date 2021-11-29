<?php

namespace Tests\Unit;

use App\TestMaterial\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase{

    /**
     * @group unit
     *
     * @return void
     */
    public function test_fibonacci() {
        $math = new Math();
        $this->assertEquals(34, $math->fibonacci(9));
    }

    /**
     * @group unit
     *
     * @return void
     */
    public function test_factorial() {
        $math = new Math();
        $this->assertEquals(120, $math->factorial(5));
    }

    /**
     * @group unit
     *
     * @return void
     */
    public function test_factorial_greater_than_fibonacci() {

        $math = new Math();
        $this->assertTrue($math->factorial(6) > $math->fibonacci(6));
    }
}
