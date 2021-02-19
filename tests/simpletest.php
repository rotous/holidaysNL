<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Yes, I know...we need some real unit tests, but for now this will do :-p

$holidays = require __DIR__ . '/national-holidays.php';

// current year
$api = new rotous\holidays\HolidaysNL();
echo 'new year of the current year: ' . $api->getNewYear() . PHP_EOL;
echo 'new year of the current year (year excluded): ' . $api->getNewYear(null, true) . PHP_EOL;

// 1972
echo 'new year of 1972: ' . $api->getNewYear(1972) . PHP_EOL;
echo 'new year of 1972 (year excluded): ' . $api->getNewYear(1972, true) . PHP_EOL;

// -10
try {
	echo 'new year of 10 BC: ';
	echo $api->getNewYear(-10) . PHP_EOL;
} catch (Exception $e) {
	echo 'Error! ' . $e->getMessage() . PHP_EOL;
}

// 3010
try {
	echo 'new year of 3010: ';
	echo $api->getNewYear(3010) . PHP_EOL;
} catch (Exception $e) {
	echo 'Error! ' . $e->getMessage() . PHP_EOL;
}

// Current year
echo 'easter of the current year: ' . $api->getEaster() . PHP_EOL;
echo 'easter of the current year (year excluded): ' . $api->getEaster(null, true) . PHP_EOL;
// 1972
echo 'easter of 1972: ' . $api->getEaster(1972) . PHP_EOL;
echo 'easter of 1972 (year excluded): ' . $api->getEaster(1972, true) . PHP_EOL;

// Current year
echo 'King or Queensday of the current year: ' . $api->getKingOrQueensDay() . PHP_EOL;
echo 'King or Queensday of the current year (year excluded): ' . $api->getKingOrQueensDay(null, true) . PHP_EOL;
// 1972
echo 'King or Queensday of 1972: ' . $api->getKingOrQueensDay(1972) . PHP_EOL;
echo 'King or Queensday of 1972 (year excluded): ' . $api->getKingOrQueensDay(1972, true) . PHP_EOL;

$domains = [
	'Nieuwjaarsdag' => 'getNewYear',
	'Koninginnedag' => 'getKingOrQueensDay',
	'Eerste Paasdag' => 'getEaster',
	'Tweede Paasdag' => 'getSecondEasterDay',
	'Hemelvaartsdag' => 'getAscensionDay',
	'Eerste Pinksterdag' => 'getPentecost',
	'Tweede Pinksterdag' => 'getSecondPentecostDay',
	'Eerste Kerstdag' => 'getChristmas',
	'Tweede Kerstdag' => 'getSecondChristmasDay',
];
foreach ($domains as $domain => $method) {
	echo '------------------------------------------------------------------------' . PHP_EOL;
	echo $method . ' tests' . PHP_EOL;

	$run = 0;
	$failed = 0;
	foreach ($holidays[$domain] as $dateString) {
		$run++;
		$y = explode('-', $dateString)[2];
		$calc = $api->$method($y);
		if ($dateString !== $calc) {
			$failed++;
			echo 'FAILED: incorrect date for ' .$domain . ' ' . $y . ': ' . $dateString . ' not equal to ' . $calc . PHP_EOL;
		}
	}

	echo $run . ' checks run, ' . $failed . ' failures' . PHP_EOL;
}
echo '------------------------------------------------------------------------' . PHP_EOL;

echo 'Holidays of current year' . PHP_EOL;
var_dump($api->getHolidays());
echo 'Holidays of 1972' . PHP_EOL;
var_dump($api->getHolidays(1972));

echo '------------------------------------------------------------------------' . PHP_EOL;
echo 'Is holiday?' . PHP_EOL;
echo '30-4-1986: ' . ($api->isHoliday('30-04-1986') ? 'true' : 'false') . PHP_EOL;
echo '26-12-1972: ' . ($api->isHoliday('26-12-1972') ? 'true' : 'false') . PHP_EOL;
echo '27-12-1972: ' . ($api->isHoliday('27-12-1972') ? 'true' : 'false') . PHP_EOL;
echo 'Current day: ' . ($api->isHoliday() ? 'true' : 'false') . PHP_EOL;

