<?php

namespace rotous\holidays;

require_once __DIR__ . '/exceptions/YearOutOfBoundsException.php';

class HolidaysNL {
	private $_timeZone;

	private $_year;

	/**
	 * Constructor
	 * @param int $year The year that will be used by the functions if none is given
	 */
	public function __construct(?int $year = null) {
		$this->setYear($year);

		$this->_timezone = new \DateTimeZone('Europe/Amsterdam');
	}

	/**
	 * Returns the current year as integer
	 */
	private function _getCurrentYear() {
		$date = new \DateTime();
		return intval($date->format('Y'), 10);
	}

	/**
	 * Check if a valid year was given. Should be between 0 and 3000!
	 * Very arbitrarily use the year 3000 as last possible date
	 */
	private function _validateYear(int $year, int $min = 0, int $max = 3000) {

		if ($year < 0 || $year > 3000) {
			throw new exceptions\YearOutOfBoundsException('Year must be between ' . $min . ' and ' . $max);
		}
	}

	/**
	 * Check if a valid year was given. Should be between 1891 and 3000!
	 *
	 * @param int $year The year that must be validated
	 */
	private function _validateYearForKingOrQueensDay(int $year) {
		$this->_validateYear($year, 1891);
	}

	/**
	 * Setter for the year property
	 * @param int $year The year that will be used by the functions if none is given
	 */
	public function setYear(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_getCurrentYear();
		}

		$this->_validateYear($year);

		$this->_year = $year;
	}

	/**
	 * Returns the new years date (easy one to begin with :-)) as DateTime object.
	 * If no year is given or null is given, the current year will be used.
	 *
	 * @param int $year The year for which the New Years date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getNewYearDateTime(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_year;
		} else {
			$this->_validateYear($year);
		}

		return new \DateTime($year.'-01-01 12:00:00', $this->_timezone);
	}

	/**
	 * Returns the new years date (easy one to begin with :-))
	 * If no year is given or null is given, the current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the New Years date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getNewYear(?int $year = null, bool $excludeYear = false) {
		$date = $this->getNewYearDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Easter date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Easter date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getEasterDateTime(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_year;
		}
		$this->_validateYear($year);

		// easter_days gives the number of days after the start of spring (21st of March)
		$edays = easter_days($year);
		$day = 21 + $edays;

		if ($day <= 31) {
			// Easter in March
			$date = new \DateTime($year . '-3-' . $day . ' 12:00:00', $this->_timezone);
		} else {
			// Easter in April
			$day = $day - 31;
			$date = new \DateTime($year . '-4-' . $day . ' 12:00:00', $this->_timezone);
		}

		return $date;
	}

	/**
	 * Returns Easter date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Easter date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getEaster(?int $year = null, bool $excludeYear = false) {
		$date = $this->getEasterDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Second Easter Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Second Easter Day date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getSecondEasterDayDateTime(?int $year = null) {
		// Just add a day to Easter
		return $this->getEasterDateTime($year)->add(new \DateInterval('P1D'));
	}

	/**
	 * Returns Second Easter Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Second Easter Day date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getSecondEasterDay(?int $year = null, bool $excludeYear = false) {
		$date = $this->getSecondEasterDayDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Ascension date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Ascension date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getAscensionDayDateTime(?int $year = null) {
		// Just add 39 days to Easter
		return $this->getEasterDateTime($year)->add(new \DateInterval('P39D'));
	}

	/**
	 * Returns Ascension date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Ascension date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getAscensionDay(?int $year = null, bool $excludeYear = false) {
		$date = $this->getAscensionDayDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Pentecost date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Pentecost date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getPentecostDateTime(?int $year = null) {
		// Just add 49 days to Easter
		return $this->getEasterDateTime($year)->add(new \DateInterval('P49D'));
	}

	/**
	 * Returns Pentecost date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Pentecost date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getPentecost(?int $year = null, bool $excludeYear = false) {
		$date = $this->getPentecostDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Second Pentecost Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Second Pentecost Day date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getSecondPentecostDayDateTime(?int $year = null) {
		// Just add 1 day to Pentecost
		return $this->getPentecostDateTime($year)->add(new \DateInterval('P1D'));
	}

	/**
	 * Returns Second Pentecost Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Second Pentecost Day date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getSecondPentecostDay(?int $year = null, bool $excludeYear = false) {
		$date = $this->getSecondPentecostDayDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Christmas date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Christmas date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getChristmasDateTime(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_year;
		}
		$this->_validateYear($year);

		return new \DateTime($year . '-12-25 12:00:00');
	}

	/**
	 * Returns Christmas date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Christmas Day date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getChristmas(?int $year = null, bool $excludeYear = false) {
		$date = $this->getChristmasDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Second Christmas Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 *
	 * @param int $year The year for which the Second Christmas Day date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getSecondChristmasDayDateTime(?int $year = null) {
		// Just add 1 day to Christmas
		return $this->getChristmasDateTime($year)->add(new \DateInterval('P1D'));

		return new \DateTime($year . '-12-26 12:00:00');
	}

	/**
	 * Returns Second Christmas Day date for the given year. If no year is given or null is given, the
	 * current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Second Christmas Day Day date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getSecondChristmasDay(?int $year = null, bool $excludeYear = false) {
		$date = $this->getSecondChristmasDayDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns Queens Day or Kings Day date for the given year.
	 * If no year is given or null is given, the current year will be used.
	 *
	 * @param int $year The year for which the Queens Day or Kings Day date is returned.
	 * If null the current year will be used
	 * @return \DateTime
	 */
	public function getKingOrQueensDayDateTime(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_year;
		}
		$this->_validateYearForKingOrQueensDay($year);

		if ($year < 1949) {
			// Birthday Queen Wilhelmina
			$date = new \DateTime($year.'-08-31 12:00:00', $this->_timezone);

		} elseif ($year < 1980) {
			// Birthday Queen Juliana
			$date = new \DateTime($year.'-04-30 12:00:00', $this->_timezone);

			// If sunday then it will be the next day
			if ($date->format('w') === '0') {
				$date->add(new \DateInterval('P1D'));
			}
		} elseif ($year < 2014) {
			// Queen Beatrix used birthday of her mother Juliana
			$date = new \DateTime($year.'-04-30 12:00:00', $this->_timezone);

			// If sunday then it will be the previous day
			if ($date->format('w') === '0') {
				$date->sub(new \DateInterval('P1D'));
			}
		} else {
			// Birthday of King Willem-Alexander
			$date = new \DateTime($year.'-04-27 12:00:00', $this->_timezone);

			// If sunday then it will be the previous day
			if ($date->format('w') === '0') {
				$date->sub(new \DateInterval('P1D'));
			}
		}

		return $date;
	}

	/**
	 * Returns Queens Day or Kings date for the given year.
	 * If no year is given or null is given, the current year will be used.
	 * Format is dd-mm-yyyy.
	 *
	 * @param int $year The year for which the Queens Day or Kings date is returned.
	 * If null the current year will be used
	 * @param bool $excludeYear Set to true to exclude the year in the returned string
	 * @return string
	 */
	public function getKingOrQueensDay(?int $year = null, bool $excludeYear = false) {
		$date = $this->getKingOrQueensDayDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		return $date->format($format);
	}

	/**
	 * Returns all holidays for the given year as an array of \DateTime objects
	 *
	 * @param int $year The year for which the hoidays are returned.
	 * If no year is given or null is given, the current year will be used.
	 * @return \DateTime[]
	 */
	public function getHolidaysDateTime(?int $year = null) {
		if (is_null($year)) {
			$year = $this->_year;
		}
		$this->_validateYear($year);

		$holidays = [
			$this->getNewYearDateTime($year),
			$this->getEasterDateTime($year),
			$this->getSecondEasterDayDateTime($year),
			$this->getAscensionDayDateTime($year),
			$this->getPentecostDateTime($year),
			$this->getSecondPentecostDayDateTime($year),
			$this->getChristmasDateTime($year),
			$this->getSecondChristmasDayDateTime($year),
		];

		// Queens or Kings day is not defined for all years, so use try catch
		try {
			$qday = $this->getKingOrQueensDayDateTime($year);
			$holidays[] = $qday;
		} catch (Exception $e) {}

		// Order on date
		usort($holidays, function($a, $b) {
			return intval($a->format('Ymd'), 10) - intval($b->format('Ymd'), 10);
		});

		return $holidays;
	}

	/**
	 * Returns all holidays for the given year as an array of strings with
	 * the format dd-mm-yyyy
	 *
	 * @param int $year The year for which the hoidays are returned.
	 * If no year is given or null is given, the current year will be used.
	 * @param bool $excludeYear Set to true to exclude the year in the returned strings
	 * @return string[]
	 */
	public function getHolidays(?int $year = null, bool $excludeYear = false) {
		$datetimes = $this->getHolidaysDateTime($year);
		$format = $excludeYear ? 'd-m' : 'd-m-Y';

		$dates = array_map(function($datetime) use ($excludeYear){
			$format = $excludeYear ? 'd-m' : 'd-m-Y';
			return $datetime->format($format);
		}, $datetimes);

		return $dates;
	}

	/**
	 * Checks if a date specified by the given \DateTime object is a holiday
	 *
	 * @param \DateTime $date The date to check. If null is passed the current
	 * date will be used
	 * @return bool
	 */
	public function isHolidayDateTime(?\DateTime $date = null) : bool {
		if (is_null($date)) {
			$date = new \DateTime();
		}

		// Make sure we have use the same time, so we can use the diff function
		$date->setTime(12, 0);

		$holidays = $this->getHolidaysDateTime($date->format('Y'));
		foreach ($holidays as $h) {
			if ($date == $h) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Checks if a date specified by the given \DateTime object is a holiday
	 *
	 * @param \DateTime $date The date to check. If null is passed the current
	 * date will be used
	 * @return bool
	 */
	public function isHoliday(?string $date = null) : bool {
		if (!is_null($date)) {
			// TODO: Add validation
			$date = explode('-', $date);
			$date = new \DateTime($date[2] . '-' . $date[1] . '-' . $date[0], $this->_timezone);
		}

		return $this->isHolidayDateTime($date);
	}
}
