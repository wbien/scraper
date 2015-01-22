<?php

namespace Wiktor\Scraper\Formatter;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

class Csv extends Formatter
{
    public function format()
    {
        $config = new ExporterConfig();
        $exporter = new Exporter($config);

        $exporter->export($this->filename, $this->getFormattedData());
    }

    protected function getFormattedData() {
        $results = array();
        foreach($this->data as $itemDetails) {
            $rooms = $itemDetails->getRooms();
            if(count($rooms)) {
                foreach($rooms as $roomType => $roomPrice) {
                    $results[] = array(
                        $itemDetails->getName(),
                        $roomType,
                        $roomPrice
                    );

                }
            }
            else {
                $results[] = array(
                    $itemDetails->getName(),
                    '',
                    ''
                );
            }
        }
        return $results;
    }


} 