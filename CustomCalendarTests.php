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
}
