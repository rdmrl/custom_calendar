<?php
/**
 * An implementation of the rules of a custom calendar.
 *
 * Calendar rules:
 * - Each year has 13 months
 * - Each even month has 21 days and each odd month has 22 days
 * - In a leap year, the last month has one less day
 * - A leap year is one divisible by 5
 * - Every week has 7 days: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday and Saturday
 * - The first day of year 1990 was Monday
 *
 * @author Ravi Damarla
 */
class CustomCalendar
{
    /*
     * The display names for the days of the week.
     *
     * Indexed from 0 starting with Sunday.
     */
    private $day_names = array(
      0 => 'Sunday',
      1 => 'Monday',
      2 => 'Tuesday',
      3 => 'Wednesday',
      4 => 'Thursday',
      5 => 'Friday',
      6 => 'Saturday',
    );

    /*
     * The offsets of the day of the week for each month in a year.
     *
     * If Jan 1st is on a Sunday, Feb 1st will be on a Monday as January has 22 days,
     * which is 3 * 7 + 1.
     *
     * February is a even month and has 21 days which fit exactly into 3 weeks. So,
     * March 1st will also be a Monday.
     *
     * March is an odd month and has 22 days, and so April 1st will be on a Tuesday.
     *
     * The same rules apply to a leap year too as only the last month is affected in
     * a leap year.
     */
    private $month_offsets = array(
      1 => 0,   // January
      2 => 1,   // February
      3 => 1,   // March
      4 => 2,   // April
      5 => 2,   // May
      6 => 3,   // June
      7 => 3,   // July
      8 => 4,   // August
      9 => 4,   // September
      10 => 5,  // October
      11 => 5,  // November
      12 => 6,  // December
      13 => 6,  // Extra
    );
 
    /**
     * Business Logic:
     *
     * There are 13 months in a year, with 7 odd months and 6 event months.
     * Assumption: The first (1st) month is odd.
     * In a common year, the total number of days is 7 * 22 + 6 * 21 = 280.
     * In a leap year, the total number of days is 6 * 22 + 7 * 21 = 279.
     *
     * 280 = 7 * 40, so a common year can be divided exactly into weeks.
     * Jan 1st for the current common year will fall on the same day as the next common year.
     *
     * 279 for a leap year is one day less. So the day of the week will shift back by 1 for
     * the Jan 1st of the common year following a leap year.
     *
     * e.g. 1990 is a leap year, and Jan 1st is a Monday (as per spec), and the year following it
     * is a common year, so it will have the day of the week for Jan 1st one day before: Sunday.
     *
     * There are 4 common years preceeding a leap year. All five of these years will have the same
     * day of week for Jan 1st. The next 5 years will have Jan 1st fall one day of the week earlier.
     *
     * To calculate the day of the week for a particular date:
     * - Calculate the year offset from 1990.
     * - Determine the day of the week for Jan 1st.
     * - Calculate the day of the week for the month of this day.
     * - Calculate the day of the week for this day.
     */

    public function getDayOfWeek($date)
    {
        echo $date, "\n";
        // Split the date into its individual parts.
        $dateParts = explode('.', $date);

        // Validate the input date.
        if (empty($dateParts) || count($dateParts) != 3) {
            echo "The date must be in the dd.mm.yyyy format. Input was: " . $date . "\n";
            return null;
        }

        // Extract the year value.
        $year = $dateParts[2];

        // Validate the year value.
        if (!is_numeric($year)) {
            echo "The year is invalid: $date\n";
            return null;
        }

        $month = $dateParts[1];

        if (!is_numeric($month) || ($month <= 0 || $month > 13)) {
            echo "The month in invalid: $date\n";
            return null;
        }

        // Calculate the offset of the input year from the base date: 1990.

        // Since the day of the week for Jan 1st changes by one every 5 years,
        // divide the year offset by 5 to get the day of the week value.
        $yearOffset = (self::$BASE_YEAR - $year) / 5;

        // Use either floor or ceil to get the day of the week value for the range
        // of 5 years. Each 5 year set has the same day of the week for Jan 1st.
        if ($yearOffset < 0) {
            $dayOffset = floor($yearOffset);
        } else {
            $dayOffset = ceil($yearOffset);
        }

        return 0;
    }

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
