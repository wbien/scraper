<?php
require '../vendor/autoload.php';

use Wiktor\Scraper\Scraper;
use Wiktor\Scraper\Formatter\Factory;


$scraper = new Scraper('http://www.unite-students.com', '/liverpool');

$option = getopt('f:');

if(empty($option['f'])) {
    $option['f'] = 'csv';
}

$formatterFactory = new Factory();
$formatter = $formatterFactory->getFormatter($option['f']);

$formatter->setData($scraper->loadData());
$formatter->setFilename('php://output');

$formatter->format();