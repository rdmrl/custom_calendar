<?php
/**
 * A set of unit tests for the CustomCalendar implementation.
 *
 * @author Ravi Damarla
 *
 */
use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($class) {
    include $class . '.php';
});

/**
 * The main test case using PHPUnit.
 */
class CustomCalendarTests extends TestCase
{
    
    // An instance of the custom calendar implementation.
    protected $customCalendar = null;

    protected function setUp()
    {
        $this->customCalendar = new CustomCalendar();
    }

    /**
     * Tests for a leap year using the custom calendar rules.
     */
    public function testLeapYear()
    {
        // A success test for a leap year.
        $isALeapYear = 1990;
        $this->assertTrue($this->customCalendar->isLeapYear($isALeapYear));

        // A failure test for a leap year.
        $notALeapYear = 1991;
        $this->assertFalse($this->customCalendar->isLeapYear($notALeapYear));
    }
}
