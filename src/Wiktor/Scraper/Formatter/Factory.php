<?php

namespace Wiktor\Scraper\Formatter;


class Factory {
    public function getFormatter($type) {
        switch ($type) {
            case 'csv': return new Csv();
            case 'json': return new Json();
            default:throw new \Exception('Unknown formatter ('.$type.')');
        }
    }
} 