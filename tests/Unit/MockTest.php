<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase{

    /**
     * @group mock
     *
     * @return void
     */
    public function test_mock_class_exists() {
        $this->getMockBuilder('mock')
            ->setMockClassName('foo')
            ->setMethods(array('bar'))
            ->getMock();

        $this->assertTrue(method_exists('foo', 'bar'));
        $this->assertTrue(class_exists('foo'));
    }
}
