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

    public function testInvalidDate()
    {
        $invalidDate = '01/01/2018';

        $retInvalidDate = $this->customCalendar->getDayOfWeek($invalidDate);
        $this->assertNull($retInvalidDate);

        $invalidDate2 = '01/01';

        $retInvalidDate2 = $this->customCalendar->getDayOfWeek($invalidDate2);
        $this->assertNull($retInvalidDate2);

        $invalidDate3 = '01-01-xxxx';

        $retInvalidDate3 = $this->customCalendar->getDayOfWeek($invalidDate3);
        $this->assertNull($retInvalidDate3);
    }

    public function testDayOfWeek()
    {
        // Test the day of the week for the known value - Jan 1st 1990.
        $testDate1 = '01.01.1990';
        $retValueDate1 = $this->customCalendar->getDayOfWeek($testDate1);
        $this->assertNotNull($retValueDate1, "The returned value from getDayOfWeek for " . $testDate1);

        $dayOfWeekDate1 = 'Monday';
        $this->assertEquals($dayOfWeekDate1, $retValueDate1);
    }
}
