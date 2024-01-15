<?php declare(strict_types=1);
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
final class Test extends TestCase
{
    /**
     * @message: Test of True gelijk is aan True
     */
    public function testTrueIsTrue(): void
    {
        $this->assertTrue(True);
    }

    /**
     * @message: Test of False gelijk is aan False
     */
    public function testFalseIsFalse(): void
    {
        $this->assertFalse(False);
    }
}