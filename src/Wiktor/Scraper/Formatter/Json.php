<?php

namespace Wiktor\Scraper\Formatter;


class Json extends Formatter
{
    public function format()
    {
        file_put_contents($this->getFilename(), json_encode($this->getFormattedData()));
    }


} 