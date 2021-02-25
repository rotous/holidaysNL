<?php
/**
 * This file is the configuration file used by Sami (https://github.com/FriendsOfPHP/Sami)
 *
 * Download the sami phar and build the docs with the following command:
 *
 *      php sami.phar update /path/to/sami.config.php
 *
 * The documentation will now be build in the doc folder.
 */

use Sami\Parser\Filter\TrueFilter;

$projectDir = __DIR__ . '/../../';
$samiDir = $projectDir . 'tools/sami/';
$sami = new Sami\Sami($projectDir . 'src', array(
    'template_dirs' => array($samiDir . 'sami-themes/phpduck'),
    'theme'         => 'phpduck',
    'title'         => 'HolidayNL PHP api Documentation',
    'build_dir'     => $projectDir . 'doc',
	'cache_dir'     => $samiDir . '.sami-cache',
));

/*
 * Include this section if you want sami to document
 * private and protected functions/properties
 */
$sami['filter'] = function () {
    return new TrueFilter();
};

return $sami;
