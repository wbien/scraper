<?php

namespace Wiktor\Scraper\Formatter;


abstract class Formatter {

    protected $data;
    protected $filename;

    abstract public function format();

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    protected function getFormattedData() {
        $results = array();
        foreach($this->data as $itemDetails) {
            $results[] = array(
                'name' => $itemDetails->getName(),
                'rooms' => $itemDetails->getRooms()
            );

        }
        return $results;
    }
} 