<?php
/**
 * An implementation of the rules of a custom calendar.
 *
 * @author Ravi Damarla
 */
class CustomCalendar
{
    /**
     * Tests if the year is a leap year.
     *
     * In this custom calendar, any year that is divisible by 5 is a leap year.
     *
     * @return true if the year is a leap year.
     */
    public function isLeapYear($year)
    {
        return ($year % 5 == 0);
    }
}
