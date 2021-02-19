# HolidaysNL

The HolidaysNL package is a PHP package that can be used to find the dates of the holidays in the Netherlands between the years 0 and 3000 (which is just a very arbitrary number)

The holidays that can be retrieved are the following:

- New Year
- Easter (1st and 2nd day)
- Queens/Kings day
- Ascension
- Pentecost (1st and 2nd day)
- Christmas (1st and nd day)

## Installation

The package can be installed with composer:

````bash
composer require rotous/holidays-nl
````

## Usage

````php
<?php

// Make sure you use the correct path to the autoload file!
require_once 'vendor/autoload.php';

$api = new \rotous\holidays\HolidaysNL();
$holidays = $api->getHolidays(1972);
/*
array(9) {
  [0]=>
  string(10) "01-01-1972"
  [1]=>
  string(10) "02-04-1972"
  [2]=>
  string(10) "03-04-1972"
  [3]=>
  string(10) "01-05-1972"
  [4]=>
  string(10) "11-05-1972"
  [5]=>
  string(10) "21-05-1972"
  [6]=>
  string(10) "22-05-1972"
  [7]=>
  string(10) "25-12-1972"
  [8]=>
  string(10) "26-12-1972"
}
*/

$api->isHoliday('01-05-1972');  // true
$api->getEaster(1972);          // "02-04-1972"
$api->getSecondEasterDay(1972); // "03-04-1972"
````

All public functions have a DateTime based counterpart:

````php
$holidays = $api->getHolidaysDateTime(1972);
/*
array(9) {
  [0]=>
  object(DateTime)#4 (3) {
    ["date"]=>
    string(26) "1972-01-01 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
   string(16) "Europe/Amsterdam"
  }
  [1]=>
  object(DateTime)#5 (3) {
    ["date"]=>
    string(26) "1972-04-02 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [2]=>
  object(DateTime)#6 (3) {
    ["date"]=>
    string(26) "1972-04-03 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [3]=>
  object(DateTime)#12 (3) {
    ["date"]=>
    string(26) "1972-05-01 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [4]=>
  object(DateTime)#7 (3) {
    ["date"]=>
    string(26) "1972-05-11 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [5]=>
  object(DateTime)#8 (3) {
    ["date"]=>
    string(26) "1972-05-21 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [6]=>
  object(DateTime)#9 (3) {
    ["date"]=>
    string(26) "1972-05-22 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(16) "Europe/Amsterdam"
  }
  [7]=>
  object(DateTime)#10 (3) {
    ["date"]=>
    string(26) "1972-12-25 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(13) "Europe/Berlin"
  }
  [8]=>
  object(DateTime)#11 (3) {
    ["date"]=>
    string(26) "1972-12-26 12:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(13) "Europe/Berlin"
  }
}
*/

$api->isHolidayDateTime(new \DateTime('1972-05-01'));  // true
$api->getEasterDateTime(1972);
/*
object(DateTime)#4 (3) {
  ["date"]=>
  string(26) "1972-04-02 12:00:00.000000"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(16) "Europe/Amsterdam"
}
*/
$api->getSecondEasterDayDateTime(1972);
/*
object(DateTime)#4 (3) {
  ["date"]=>
  string(26) "1972-04-03 12:00:00.000000"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(16) "Europe/Amsterdam"
}
*/
````
