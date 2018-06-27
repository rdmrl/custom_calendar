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

    // Create a new instance of the CustomCalendar for use within the test cases.
    protected function setUp()
    {
        $this->customCalendar = new CustomCalendar();
    }

    /**
     * Test the input validation code with invalid dates.
     */
    public function testInvalidDate()
    {
        $invalidDate = '01/01/2018';

        $retInvalidDate = $this->customCalendar->getDayOfWeek($invalidDate);
        $this->assertNull($retInvalidDate);

        $invalidDate2 = '01/01';

        $retInvalidDate2 = $this->customCalendar->getDayOfWeek($invalidDate2);
        $this->assertNull($retInvalidDate2);

        $invalidDate3 = '01.01.xxxx';

        $retInvalidDate3 = $this->customCalendar->getDayOfWeek($invalidDate3);
        $this->assertNull($retInvalidDate3);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekNextYear()
    {
        // Test the day of the week for the next year - July 2nd 1991.
        $testDate2 = '02.07.1991';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Thursday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekYear2013()
    {
        // Test the day of the week for the year - Jan 1st 2013.
        $testDate2 = '01.01.2013';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Wednesday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekYear2018()
    {
        // Test the day of the week for the year - Jan 1st 2018.
        $testDate2 = '01.01.2018';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Tuesday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekYear2026()
    {
        // Test the day of the week for the next year - Jan 1st 2026.
        $testDate2 = '01.01.2026';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Sunday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekPrevYear()
    {
        // Test the day of the week for the next year - Jan 1st 1989.
        $testDate2 = '01.01.1989';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Tuesday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }

    /**
     * Test the day of the week function with a specific date.
     */
    public function testDayOfWeekYear1970()
    {
        // Test the day of the week for the next year - Jan 1st 1970.
        $testDate2 = '01.01.1970';
        $retValueDate2 = $this->customCalendar->getDayOfWeek($testDate2);
        $this->assertNotNull($retValueDate2, "The returned value from getDayOfWeek for " . $testDate2);

        $dayOfWeekDate2 = 'Friday';
        $this->assertEquals($dayOfWeekDate2, $retValueDate2);
    }
}
